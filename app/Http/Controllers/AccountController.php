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
            'mobile' => 'required|string|max:15',
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'birthday' => 'nullable|date',
            'mellicode' => 'nullable|string|max:10',
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

        $account->update($validatedData);

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
           'mobile' => 'required|string|max:15',
           'company' => 'nullable|string|max:255',
           'account_type' => 'required|string|max:255'
        ]);

        $createAccount = Account::create([
            'account_type' => $validatedData['account_type'],
            'name' => $validatedData['name'],
            'family' =>$validatedData['family'],
            'mobile' => $validatedData['mobile'],
            'company' => $validatedData['company']
        ]);

        $password = Str::random(8);

        $createUser = User::create([
           'account_id' => $createAccount->id,
           'name' => $validatedData['name'],
           'family' =>$validatedData['family'],
           'mobile' => $validatedData['mobile'],
           'company_name' => $validatedData['company'],
           'password' => bcrypt($password),
           'user_type' => 'admin',
           'user_status' => 'Active'
        ]);

        Alert::success('موفق', 'حساب کاربری با موفقیت ایجاد شد.');
        Auth::login($createUser);

        return redirect(RouteServiceProvider::HOME);    }
}
