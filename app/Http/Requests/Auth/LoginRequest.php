<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'mobile' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $user = User::where('mobile', $this->input('mobile'))->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'mobile' => 'کاربری با این شماره موبایل یافت نشد.'
            ]);
        }

        if ($user->account->account_status == 'deActive') {
            throw ValidationException::withMessages([
                'account' => 'کاربر گرامی اکانت شما غیر فعال میباشد. لطفا با پشتیبانی تماس بگیرید.'
            ]);
        }

        if ($user->account->account_status == 'waiting') {
            throw ValidationException::withMessages([
                'account' => 'کاربر گرامی اکانت شما در انتظار تایید میباشد.'
            ]);
        }

        if ($user->user_status == 'deActive') {
            throw ValidationException::withMessages([
                'status' => 'کاربر گرامی شما اجازه ورود ندارید.' . $user->deactivation_reason,
            ]);
        }

        if (! Auth::attempt($this->only('mobile', 'password'), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'password' => 'رمز عبور وارد شده صحیح نیست.',
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('mobile')).'|'.$this->ip());
    }
}
