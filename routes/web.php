<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AccountPaymentTypeVariableController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\CartHeadController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerAddressController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\Front\AccountController as FrontAccountController;
use App\Http\Controllers\Front\DashboardController;
use App\Http\Controllers\Front\ProductController as FrontProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentsTypeController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\PaymentTypeVariableController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ShopSetting;
use App\Http\Controllers\ShopSettingController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\UserController;
use App\Models\Account;
use App\Models\CustomerAddress;
use App\Models\Transport;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/{slug}', [HomeController::class, 'index']);

Route::post('users', [UserController::class, 'store'])->name('users.store');


Route::post('/uploadFile', [ApiController::class, 'uploadFile']);

require __DIR__ . '/auth.php';

Route::Post('user/create', [AccountController::class, 'newUserAccount'])->name('newUserAccount');

Route::Post('forgotPassword', [AccountController::class, 'forgotPassword'])->name('forgotPassword');
Route::Post('codePassword', [AccountController::class, 'codePassword'])->name('codePassword');

// فعال و غیرفعال کردن کاربر
Route::put('user/activation', [UserController::class, 'accountusersactivation'])->name('account.users.activation');

// فعال و غیرفعال کردن اکانت
Route::put('account/activation', [AccountController::class, 'accountusersactivation'])->name('account.activation');


Route::post('/resendCode', [AccountController::class, 'resendCode'])->name('resendCode');


Route::post('/customer-login', [CustomerController::class, 'sendLoginCode'])->name('customerlogin');

Route::post('/resendLoginCode', [CustomerController::class, 'resendLoginCode'])->name('resendLoginCode');

Route::post('/confirmLogin', [CustomerController::class, 'confirmLogin'])->name('confirmLogin');


Route::post('/completeInfo/{customer_id}', [CheckoutController::class, 'storeInfo'])->name('storeInfo');

Route::post('/addAddress/{customer_id}', [CustomerAddressController::class, 'addAddress'])->name('addAddress');


Route::get('/', [DashboardController::class, 'index']);


Route::put('/delete-image', [CategoryController::class, 'deleteImage'])->name('deleteimage');

Route::put('/delete-product-images', [ProductController::class, 'deleteImage'])->name('deleteproductimage');

Route::post('/payment-type-to-account', [ShopSettingController::class, 'PaymentTypeToAccount'])->name('PaymentTypeToAccount');



Route::prefix('admin')->group(function () {

    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('transport', TransportController::class);
    Route::resource('account', AccountController::class);
    Route::resource('discount', DiscountController::class);
    Route::resource('setting', SettingController::class);
    Route::resource('PaymentTypeVariable', PaymentTypeVariableController::class);

    Route::post('/PaymentTypeVariable/create', [PaymentTypeVariableController::class, 'create'])->name('PaymentTypeVariable.create');


    Route::prefix('account')->group(function () {
        Route::get('{accountId}/users', [UserController::class, 'showUsers'])->name('user.showUsers');
        Route::get('{accountId}/users/{userId}/edit', [UserController::class, 'editUser'])->name('user.editUser');
        Route::put('{accountId}/users/{userId}', [UserController::class, 'updateUser'])->name('users.updateUser');
        Route::delete('{accountId}/users/{userId}', [UserController::class, 'destroyUser'])->name('account.users.destroy');
    });

    Route::get('users/create/{accountId}', [UserController::class, 'create'])->name('users.create');


    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });


    //  پردازش جستجو محصولات
    Route::get('/result-product', [ProductController::class, 'searchproduct'])->name('search');

    //  پردازش جستجو حساب کاربری
    Route::get('/result-accounts', [AccountController::class, 'searchAccounts'])->name('accounts.search');


    Route::get('accounts/list', [FrontAccountController::class, 'index'])->name('front.accounts.list');
    Route::get('products/list', [FrontProductController::class, 'index'])->name('front.products.list');
    Route::get('products/{id}', [FrontProductController::class, 'single'])->name('front.products.single');

    Route::post('cart/add', [CartHeadController::class, 'addToCart']);
    Route::get('cart', [CartHeadController::class, 'showCart'])->name('showCart');
    Route::delete('cart/remove/{body}', [CartHeadController::class, 'removeFromCart']);
    Route::put('cart/amount/{body}', [CartHeadController::class, 'amount']);
    Route::put('cart/discount/{cart}', [CartHeadController::class, 'discount']);
    Route::put('cart/discount/remove/{cart}', [CartHeadController::class, 'removeDiscount']);

    Route::get('checkout', function () {
        return view('front.checkout.checkout');
    });

    Route::resource('payments_type', PaymentTypeController::class);


    Route::get('/checkout/{customer_id?}', [CheckoutController::class, 'index'])->name('checkout');

    Route::get('/customer-login', [CustomerController::class, 'loginForm'])->name('customer.login');

    Route::get('/completeInfo/{customer_id}', [CheckoutController::class, 'completeInfo'])->name('completeInfo');

    Route::get('/shop-setting', [ShopSettingController::class, 'index'])->name('shopSetting');

    Route::get('/AccountPaymentTypeVariable/{id}', [AccountPaymentTypeVariableController::class, 'create'])->name('AccountPaymentTypeVariable');
    Route::post('AccountPaymentTypeVariable', [AccountPaymentTypeVariableController::class, 'store'])->name('CreateAccountPaymentTypeVariable');
});
