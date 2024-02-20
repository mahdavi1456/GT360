<?php

namespace App\Http\Controllers\Auth;



use App\Models\User;
use App\Models\Project;
use Illuminate\View\View;
// use public_html\class\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('admin.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mobile' => ['required', 'string', 'digits:11', 'exists:users,mobile'],
            'password' => ['required'],
        ]);
        $user = User::where('mobile', $request->mobile)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                auth()->loginUsingId($user->id);
                return to_route('dashboard');
            }else{
                $error='رمز عبور اشتباه است';
            }
        }else{
            $error='نام کاربری وجود ندارد';
        }


        return back()->withErrors(["error" => $error]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        //Close Project on Logout
        //Set close_project key = 0 in settings Table
        if (Project::checkOpenProject(auth()->user()->account_id)) {
            Project::closeProject(auth()->user()->account_id);
        }

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
