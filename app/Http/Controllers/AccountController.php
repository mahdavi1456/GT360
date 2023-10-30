<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = Account::all();
        return view('admin.account.list', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.account.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'account_type' => 'required|in:حقیقی,حقوقی',
            'name' => 'required|string|max:255',
            'family' => 'required|string|max:255',
            'mobile' => 'required|string|digits:11',
            'phone' => 'nullable|string|max:11',
            'email' => 'nullable|email|max:255',
            'birthday' => 'nullable',
            'mellicode' => 'nullable|string|digits:10',
            'state' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'postalcode' => 'nullable|string|max:10',
            'company' => 'nullable|string|max:255',
            'company_type' => 'nullable|string|max:255',
            'national_id' => 'nullable|string|max:20',
            'registration_number' => 'nullable|string|max:20',
            'registration_date' => 'nullable|date',
        ]);

        $birthday = Carbon::parse(Verta::parse($validatedData['birthday'])->formatGregorian('Y-m-d'));

        $account = Account::create([
            'account_type' => $validatedData['account_type'],
            'name' => $validatedData['name'],
            'family' => $validatedData['family'],
            'mobile' => $validatedData['mobile'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'birthday' => $birthday,
            'mellicode' => $validatedData['mellicode'],
            'state' => $validatedData['state'],
            'city' => $validatedData['city'],
            'address' => $validatedData['address'],
            'postalcode' => $validatedData['postalcode'],
            'company' => $validatedData['company'],
            'company_type' => $validatedData['company_type'],
            'national_id' => $validatedData['national_id'],
            'registration_number' => $validatedData['registration_number'],
            'registration_date' => $validatedData['registration_date'],
            'account_status' => 'waiting',
        ]);

        Alert::success('موفق', 'حساب کاربری با موفقیت ایجاد شد.');
        return redirect()->route('account.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $account = Account::findOrFail($id);
        return view('admin.account.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $account = Account::findOrFail($id);

        $validatedData = $request->validate([
            'account_type' => 'required|in:حقیقی,حقوقی',
            'name' => 'required|string|max:255',
            'family' => 'required|string|max:255',
            'mobile' => 'required|string|digits:11',
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'birthday' => 'nullable',
            'mellicode' => 'nullable|string|max:10',
            'state' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'postalcode' => 'nullable|string|max:10',
            'slug' => 'required|string|max:255',
            'company' => 'required_if:account_type,حقوقی|max:255',
            'company_type' => 'nullable|string|max:255',
            'national_id' => 'nullable|string|max:20',
            'registration_number' => 'nullable|string|max:20',
            'registration_date' => 'nullable',
        ]);

        if ($validatedData['birthday']  != null) {
            $birthday = Carbon::parse(Verta::parse($validatedData['birthday'])->formatGregorian('Y-m-d'));
        } else {
            $birthday = null;
        }


        if ($validatedData['registration_date']  != null) {
            $registration_date = Carbon::parse(Verta::parse($validatedData['registration_date'])->formatGregorian('Y-m-d'));
        } else {
            $registration_date = null;
        }


        $account->update([
            'account_type' => $validatedData['account_type'],
            'name' => $validatedData['name'],
            'family' => $validatedData['family'],
            'mobile' => $validatedData['mobile'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'birthday' => $birthday,
            'mellicode' => $validatedData['mellicode'],
            'state' => $validatedData['state'],
            'city' => $validatedData['city'],
            'address' => $validatedData['address'],
            'postalcode' => $validatedData['postalcode'],
            'slug' => $validatedData['slug'],
            'company' => $validatedData['company'],
            'company_type' => $validatedData['company_type'],
            'national_id' => $validatedData['national_id'],
            'registration_number' => $validatedData['registration_number'],
            'registration_date' => $registration_date,

        ]);

        Alert::success('موفق', 'حساب کاربری با موفقیت ویرایش شد.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $account = Account::find($id);
        $account->delete();

        Alert::success('موفق', 'حساب کاربری با موفقیت حذف شد.');
        return redirect()->route('account.index');
    }


    public function newUserAccount(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'family' => 'required|string|max:255',
            'mobile' => 'required|string|digits:11',
            'company' => 'nullable|string|max:255',
            'account_type' => 'required|string|max:255'
        ]);

        $createAccount = Account::create([
            'account_type' => $validatedData['account_type'],
            'name' => $validatedData['name'],
            'family' => $validatedData['family'],
            'mobile' => $validatedData['mobile'],
            'company' => $validatedData['company']
        ]);

        $password = Str::random(8);

        $createUser = User::create([
            'account_id' => $createAccount->id,
            'name' => $validatedData['name'],
            'family' => $validatedData['family'],
            'mobile' => $validatedData['mobile'],
            'company_name' => $validatedData['company'],
            'password' => $password,
            'user_type' => 'admin',
            'user_status' => 'Active'
        ]);

        $mobile = $validatedData['mobile'];
        $message = 'کابر گرامی رمز عبور ورود شما : ' . $password;

        // sendSMS($mobile, $message);

        Alert::success('موفق', 'حساب کاربری با موفقیت ایجاد شد.');
        Auth::login($createUser);

        return redirect(RouteServiceProvider::HOME);
    }

    public function forgotPassword(Request $request)
    {
        $validate = $request->validate(
            [
                'mobile' => 'required|numeric|digits:11'
            ],
            [
                'mobile.required' => 'فیلد موبایل الزامی است.',

                'mobile.digits' => 'موبایل باید دقیقاً 11 رقم باشد',
            ]
        );

        $user = User::where('mobile', $validate['mobile'])->first();
        if ($user) {
            $code = rand(1000, 9999);

            $user->update([
                'remember_token' => $code
            ]);

            Cache::put('remember_token', $code, Carbon::now()->addSeconds(60));

            $mobile = $validate['mobile'];
            $message = 'کابر گرامی کد یکبار مصرف شما : ' . $code;

            // sendSMS($mobile, $message);

        } else {

            return response()->json(['message' => 'کاربری با این موبایل یافت نشد'], 404);
        }
    }

    public function codePassword(Request $request)
    {

        $validate = $request->validate(
            [
                'code' => 'required|string|max:4'
            ],
            [
                'code.required' => 'فیلد کد الزامی است.',
            ]
        );

        $user = User::where('mobile', $request->mobile)->first();

        $randomNumber = Cache::get('remember_token');

        $userEnteredCode = $validate['code'];

        if ($userEnteredCode == $randomNumber) {

            $newPassword = Str::random(8);

            $user->update([
                'password' => $newPassword
            ]);

            $mobile = $user->mobile;
            $message = 'کابر گرامی رمز عبور شما با موفقیت تغییر یافت. رمز عبور جدید : ' . $newPassword;

            // sendSMS($mobile, $message);

            Auth::login($user);

            return response()->json(['success' => 'تغییر رمز عبور با موفقیت انجام شد']);
        } else {

            return response()->json(['message' => 'کد وارد شده اشتباه است'], 404);
        }
    }

    public function resendCode(Request $request)
    {

        $validate = $request->validate(
            [
                'mobile' => 'required|numeric|digits:11'
            ],
            [
                'mobile.required' => 'فیلد موبایل الزامی است.',
                'mobile.digits' => 'موبایل باید دقیقاً 11 رقم باشد',
            ]
        );

        $user = User::where('mobile', $validate['mobile'])->first();
        if ($user) {
            $code = rand(1000, 9999);
            $mobile = $validate['mobile'];
            $username = $mobile;

            $user->update([
                'remember_token' => $code
            ]);

            Cache::put('remember_token', $code, Carbon::now()->addSeconds(31));

            $message = 'کابر گرامی کد یکبار مصرف شما : ' . $code;

            // sendSMS($mobile, $message);

        }
    }

    public function searchAccounts(Request $request)
    {
        $query = Account::query();

        $query->when($request->filled('name'), function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->input('name') . '%');
        });

        $query->when($request->filled('family'), function ($q) use ($request) {
            $q->where('family', 'like', '%' . $request->input('family') . '%');
        });

        $query->when($request->filled('company'), function ($q) use ($request) {
            $q->where('company', 'like', '%' . $request->input('company') . '%');
        });

        $accounts = $query->get();

        return view('admin.account.list', compact('accounts'));
    }

    public function accountusersactivation(Request $request)
    {
        $id = $request->id;
        $reseaon = $request->reseaon;

        $account = Account::findOrFail($id);
        $active = $request->active;
        $account->update([
            'account_status' => $active,
            'deactivation_reason' => $reseaon
        ]);

        Alert::success('موفق', 'وضعیت کاربر با موفقیت تغییر کرد');
        return back();

    }
}
