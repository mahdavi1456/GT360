<?php

namespace App\Http\Controllers;

use App\Models\ReservePlan;
use Carbon\Carbon;
use App\Models\User;
use App\Servieses\Sms;
use App\Models\Account;
use App\Models\Setting;
use App\Models\Post;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Providers\RouteServiceProvider;

use RealRashid\SweetAlert\Facades\Alert;
use function PHPUnit\Framework\fileExists;

class AccountController extends Controller
{

    public function dashboard()
    {
        $setting = new Setting();

        return view('admin.dashboard', compact('setting'));
    }
    public function loadSite($slug)
    {
        $settingModel = new Setting;
        $postModel = new Post;
        $account = Account::where('slug', $slug)->first();
        if ($account) {
            $theme = $account->activeTheme();
            $view = "front.theme.$theme.index";
            $accountId = $account->id;
            $products = Post::where('component_id', 2)->get();
            return view($view, compact('settingModel', 'postModel', 'accountId', 'products'));
        }
        return "یک تم برای خود انتخاب کنید";
    }

    public function reserve($slug)
    {
        $settingModel = new Setting;
        $reservePlanModel = new ReservePlan;
        $account = Account::where('slug', $slug)->first();

        $v = new Verta();
        $currentYear = $v->year;
        $currentMonth = $v->month;
        $currentDay = $v->day;

        if ($account) {
            $theme = $account->activeTheme();
            $view = "front.theme.$theme.reserve";
            $accountId = $account->id;
            return view($view, compact('settingModel', 'reservePlanModel', 'accountId', 'currentYear', 'currentMonth', 'currentDay'));
        }
        return "یک تم برای خود انتخاب کنید";
    }

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
            'mobile' => 'required|string|digits:11|regex:/^09[0-9]{9}/|unique:accounts,mobile',
            'phone' => 'nullable|string|max:11',
            'email' => 'nullable|email|max:255',
            'birthday' => 'nullable',
            'mellicode' => 'nullable|string|digits:10',
            'state' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'postalcode' => 'nullable|string|max:10',
            'slug' => 'required|string|max:255|unique:accounts,slug',
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

    public function imageDestroy(Account $account)
    {
        if (file_exists(public_path(ert('aip') . $account->account_image))) {
            unlink(public_path(ert('aip') . $account->account_image));
        }
        $account->update(['account_image' => null]);
        alert()->success('موفق', 'تصویر مورد نظر حذف شد');
        return back();
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
            'mobile' => 'required|string|digits:11|regex:/^09[0-9]{9}/|unique:accounts,mobile,' . $id,
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'birthday' => 'nullable',
            'mellicode' => 'nullable|string|max:10',
            'state' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'postalcode' => 'nullable|string|max:10',
            'slug' => 'required|string|max:255|unique:accounts,slug,' . $id,
            'company' => 'required|max:255',
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
            'mobile' => 'required|string|digits:11|regex:/^09[0-9]{9}/|unique:accounts,mobile',
            'company' => 'nullable|string|max:255',
            'account_type' => 'required|string|max:255'
        ]);

        $createAccount = Account::create([
            'account_type' => $validatedData['account_type'],
            'name' => $validatedData['name'],
            'family' => $validatedData['family'],
            'mobile' => $validatedData['mobile'],
            'company' => $validatedData['company'],
            'account_status' => 'waiting',
            'account_acl' => 'admin-account'
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

        Alert::success('موفق', 'حساب کاربری شما با موفقیت ایجاد شد و در انتظار تایید میباشد.');

        return back();
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
            //  sendSMS($mobile, $message);
            $paras = ['code' => $code];
            Sms::sendWithPattern('7wvqeoyeag6a8ln', $paras, $mobile);
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
            $paras = [
                'username' => $mobile,
                'password' => $newPassword
            ];

            Sms::sendWithPattern('504kb8ry8mfzdn6', $paras, $mobile);

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

            $user->update([
                'remember_token' => $code
            ]);

            Cache::put('remember_token', $code, Carbon::now()->addSeconds(31));

            $paras = ['code' => $code];
            Sms::sendWithPattern('7wvqeoyeag6a8ln', $paras, $mobile);
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

    public function editProfile(Account $account)
    {
        ert('cd');
        return view('admin.account-profile.edit', compact('account'));
    }

    public function updateProfile(Request $request, Account $account)
    {
        $validatedData = $request->validate([
            'account_type' => 'required|in:حقیقی,حقوقی',
            'name' => 'required|string|max:255',
            'family' => 'required|string|max:255',
            'mobile' => 'required|string|digits:11|regex:/^09[0-9]{9}/|unique:accounts,mobile,' . $account->id,
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'birthday' => 'nullable',
            'mellicode' => 'nullable|string|max:10',
            'state' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'postalcode' => 'nullable|string|max:10',
            'company' => 'required|max:255',
            'company_type' => 'nullable|string|max:255',
            'national_id' => 'nullable|string|max:20',
            'registration_number' => 'nullable|string|max:20',
            'registration_date' => 'nullable',
            'account_image' => 'image'
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
        $fileName = $account->account_image;

        if ($request->file('account_image')) {
            if ($account->account_image and file_exists(public_path(ert('aip') . $account->account_image))) {
                unlink(public_path(ert('aip') . $account->account_image));
            }
            $file = $request->account_image;

            $fileName = now()->timestamp . '_' . $file->getClientOriginalName();
            $file->move(public_path(ert('aip')), $fileName);
        }
        // dd($fileName);
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
            'company' => $validatedData['company'],
            'company_type' => $validatedData['company_type'],
            'national_id' => $validatedData['national_id'],
            'registration_number' => $validatedData['registration_number'],
            'registration_date' => $registration_date,
            'account_image' => $fileName,
        ]);

        Alert::success('موفق', 'حساب کاربری با موفقیت ویرایش شد.');
        return to_route('dashboard');
    }

    public function accountSiteEdit( $account)
    {
        $account=Account::findOrFail($account);
        return view('admin.account.editWebsite', compact('account'));
    }

    public function accountSiteUpdate(Request $req, $account)
    {
        $account=Account::findOrFail($account);
        $req->validate([
            'slug' => 'required|string|max:255|unique:accounts,slug,' . $account->id,
        ]);
        $data=$req->except('_token','_method','q');
        $account->update($data);
        Alert::success('موفق', 'اطلاعات وب سایت با موفقیت ثبت شد.');
        return to_route('dashboard');
    }

    public function showPage($slug, $id)
    {
        $settingModel = new Setting;
        $postModel = new Post;
        $account = Account::where('slug', $slug)->first();
        if ($account) {
            $theme = $account->activeTheme();
            $view = "front.theme.$theme.page";
            $accountId = $account->id;
            $products = Post::where('component_id', 2)->get();
            return view($view, compact('settingModel', 'postModel', 'accountId', 'products'));
        }
        return "یک تم برای خود انتخاب کنید";
    }

}
