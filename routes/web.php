<?php
use App\Models\User;
use App\Servieses\Sms;
use App\Models\Account;
use App\Models\Setting;
use App\Models\Transport;
use App\Models\Project;
use App\Models\CustomerAddress;
use Jenssegers\Agent\Facades\Agent;

use App\Http\Controllers\ShopSetting;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\NavController;
use App\Http\Controllers\FontController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddonController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PalleteController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CartHeadController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\FormItemController;
use App\Http\Controllers\TaxonomyController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\ReservePartController;
use App\Http\Controllers\ReservePlanController;
use App\Http\Controllers\ShopSettingController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PaymentsTypeController;
use App\Http\Controllers\ReserveOrderController;
use App\Http\Controllers\ThemeSettingController;
use App\Http\Controllers\CheckoutOptionController;
use App\Http\Controllers\ConfirmCustomerController;
use App\Http\Controllers\CustomerAddressController;

use App\Http\Controllers\Front\DashboardController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\PaymentTypeVariableController;

use App\Http\Controllers\AccountPaymentTypeVariableController;
use App\Http\Controllers\Front\AccountController as FrontAccountController;
use App\Http\Controllers\Front\ProductController as FrontProductController;

//Website
Route::get('/web/{slug}', [AccountController::class, 'loadSite'])->name('enterSite');
Route::get('/web/{slug}/reserve', [AccountController::class, 'reserve'])->name('reserve');
Route::get('/web/{slug}/page/{link}/{pageId}', [AccountController::class, 'showPage'])->name('showPage');
Route::get('/web/{slug}/post/{componentName}/{postId}', [AccountController::class, 'showPost'])->name('showPost');

// Route::get('/{slug}', [HomeController::class, 'index'])->name('slug.products');
Route::get('/', [DashboardController::class, 'index']);
Route::get('/test', function () {
    // $paras=['username'=>'rasoul','password'=>'oihrthgfuh'];
    // $paras=['code'=>44853];
    // $sms=Sms::sendWithPattern('7wvqeoyeag6a8ln', $paras,'09913814509');
    // dump($sms);
});

Route::get('accounts/list', [FrontAccountController::class, 'index'])->name('front.accounts.list');
Route::get('products/list', [FrontProductController::class, 'index'])->name('front.products.list');
Route::get('products/{id}', [FrontProductController::class, 'single'])->name('front.products.single');
Route::delete('account/image/{account}/destroy', [AccountController::class, 'imageDestroy'])->name('account.image.destroy');

Route::post('/customer-login', [CustomerController::class, 'sendLoginCode'])->name('customerlogin');
Route::post('/resendLoginCode', [CustomerController::class, 'resendLoginCode'])->name('resendLoginCode');
Route::post('/confirmLogin', [CustomerController::class, 'confirmLogin'])->name('confirmLogin');

Route::post('/completeInfo/{customer_id}', [CheckoutController::class, 'storeInfo'])->name('storeInfo');
Route::post('/addAddress/{customer_id}', [CustomerAddressController::class, 'addAddress'])->name('addAddress');

Route::get('customer/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('customer/checkout/transport', [CheckoutController::class, 'transportSelect'])->name('checkout.transport');
Route::post('customer/checkout/addon', [CheckoutController::class, 'addonSelect'])->name('checkout.addon');
Route::post('customer/checkout/factor', [CheckoutController::class, 'loadFactor'])->name('checkout.factor');

Route::post('/check-confirm-customer', [ConfirmCustomerController::class, 'check'])->name('confirm-customer.check');



//Transaction
Route::post('/start-transaction', [TransactionController::class, 'start'])->name('transaction.start');
Route::get('/verify-transaction', [TransactionController::class, 'verify'])->name('transaction.verify');


//Admin Routes
Route::middleware(['auth', 'visit'])->group(function () {

    Route::get('change-password', [NewPasswordController::class, 'create'])->name('change.pass'); //used for change-password
    Route::post('change-password', [NewPasswordController::class, 'storePassword'])->name('storePassword');
    Route::prefix('admin')->group(function () {

        //agent a cos
        Route::get('subsets',[AccountController::class, 'subsetList'])->name('subsets');

        //Nav
        Route::resource('nav', NavController::class);
        Route::get('nav-items', [NavController::class,'navItems'])->name('nav.items');
        Route::get('nav-item-resort', [NavController::class,'resortItems'])->name('nav.resort');

        //Project
        Route::delete('project/{logo}/destroy', [ProjectController::class,'logoDestroy'])->name('project.logo.destroy');
        Route::resource('project', ProjectController::class);
        Route::get('/choose-project', [ProjectController::class, 'chooseProject'])->name('chooseProject');
        Route::get('/open-project', [ProjectController::class, 'openProject'])->name('openProject');

        //Plan
        Route::resource('plan', PlanController::class);
        Route::get('plan/{plan}/items', [PlanController::class, 'ListItems'])->name('plan.ListItems');
        // Route::get('plan/{plan}/items-create',[PlanController::class,'itemCreate'])->name('plan.itemCreate');
        Route::post('plan-item', [PlanController::class, 'stroeItem'])->name('plan.stroeItem');
        // Route::get('plan-item/{item}/edit',[PlanController::class,'itemEdit'])->name('plan.itemEdit');
        // Route::put('plan-item/{item}/update',[PlanController::class,'itemUpdate'])->name('plan.itemUpdate');
        Route::delete('plan-item/{item}/delete', [PlanController::class, 'itemDelete'])->name('plan.itemDelete');




        Route::get('/dashboard', [AccountController::class, 'dashboard'])->middleware('verified')->name('dashboard');

        Route::get('/visits', [LogController::class, 'visits'])->name('log.visits');
        Route::resource('media', MediaController::class);
        Route::post('media-upload', [MediaController::class, 'mediaUpload'])->name('mediaUpload');
        Route::post('media-list', [MediaController::class, 'mediaList'])->name('mediaList');
        Route::post('media-delete', [MediaController::class, 'mediaDelete'])->name('mediaDelete');

        Route::resource('social-media', SocialMediaController::class);
        Route::resource('contact', ContactController::class);
        Route::resource('font', FontController::class);
        Route::resource('pallete', PalleteController::class);

        Route::resource('reserve-part', ReservePartController::class);
        Route::resource('reserve-plan', ReservePlanController::class);
        Route::post('reserve-plan/info-form', [ReservePlanController::class, 'InfoForm'])->name('reservePlan.InfoForm');
        Route::post('reserve-plan/confirm-mobile-form', [ReservePlanController::class, 'ConfirmMobileForm'])->name('reservePlan.ConfirmMobileForm');
        Route::resource('reserve-order', ReserveOrderController::class);

        Route::post('/image-upload', [PostController::class, 'uploadImage'])->name('post.thumb');
        Route::get('/post-image-destroy', [PostController::class, 'thumbDestroy'])->name('thumb.destroy');
        Route::resource('product', ProductController::class);

        Route::get('theme/choose', [ThemeController::class, 'choose'])->name('theme.choose');
        Route::get('theme/{image}/destroy', [ThemeController::class, 'imageDestroy'])->name('theme.imageDestroy');
        Route::resource('theme', ThemeController::class);
        Route::get('theme/{theme}/active-theme', [ThemeController::class, 'activeTheme'])->name('theme.activeTheme');
        Route::get('theme/{theme}/component/', [ThemeController::class, 'selectComponent'])->name('theme.selectComponent');
        Route::post('theme/{theme}/component/store', [ThemeController::class, 'componentStore'])->name('theme.componentStore');
        Route::get('theme/{theme}/nav', [ThemeController::class, 'selectNav'])->name('theme.selectNav');
        Route::post('theme/{theme}/nav/store', [ThemeController::class, 'NavStore'])->name('theme.navStore');

        Route::get('personalize', [ThemeController::class, 'personalize'])->name('theme.personalize');
        Route::post('update-personalize', [ThemeController::class, 'updatePersonalize'])->name('theme.updatePersonalize');

        Route::resource('taxonomy', TaxonomyController::class);

        Route::resource('component', ComponentController::class);
        Route::get('component/{component}/choose-taxonomy', [ComponentController::class, 'chooseTaxonomy'])->name('component.chooseTaxonomy');
        Route::post('component/{component}/choose-taxonomy', [ComponentController::class, 'taxonomyStore'])->name('component.taxonomyStore');

        Route::get('theme-components', [ComponentController::class, 'themeComponents'])->name('themeComponents');


        Route::resource('term', TermController::class);
        Route::post('term-list', [TermController::class, 'termList'])->name('termList');

        Route::resource('post', PostController::class);
        Route::get('page-destroy-image',[PageController::class,'pageImageDestroy'])->name('pageImage.destroy');
        Route::post('page-upload-image',[PageController::class,'uploadImage'])->name('page.image');
        Route::resource('page', PageController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('transport', TransportController::class);
        Route::resource('discount', DiscountController::class);

        //setting setting setting setting setting setting setting

        Route::get('setting/get-images', [ThemeSettingController::class, 'getImages'])->name('setting.getImages');
        Route::get('setting/images-destroy', [ThemeSettingController::class, 'destroyImage'])->name('setting.destroyImage');
        Route::resource('setting', SettingController::class);
        Route::resource('theme-setting', ThemeSettingController::class);

        //end setting end settingend settingend settingend setting

        Route::resource('form', FormController::class);
        Route::resource('form-item', FormItemController::class);

        // Route::get('getimages/')

        Route::resource('PaymentTypeVariable', PaymentTypeVariableController::class);
        Route::resource('addons', AddonController::class);
        Route::resource('payments_type', PaymentTypeController::class);
        Route::resource('account', AccountController::class);

        Route::get('/result-product', [ProductController::class, 'searchproduct'])->name('search');

        Route::get('/PaymentTypeVariable/{paymentType}/create', [PaymentTypeVariableController::class, 'create'])->name('PaymentTypeVariable.create');
        Route::get('users/create/{accountId}', [UserController::class, 'create'])->name('users.create');

        Route::get('/shop-setting', [ShopSettingController::class, 'index'])->name('shopSetting');

        Route::get('/AccountPaymentTypeVariable/{paymentType}', [AccountPaymentTypeVariableController::class, 'create'])->name('AccountPaymentTypeVariable');
        Route::post('AccountPaymentTypeVariable', [AccountPaymentTypeVariableController::class, 'store'])->name('CreateAccountPaymentTypeVariable');

        Route::get('/result-accounts', [AccountController::class, 'searchAccounts'])->name('accounts.search');

        // account account account account account
        // account account account account account
        Route::prefix('account')->group(function () {
            Route::get('{account}/profile', [AccountController::class, 'editProfile'])->name('account.profile.edit');
            Route::put('{account}/profile', [AccountController::class, 'updateProfile'])->name('account.profile.update');
            Route::get('{accountId}/users', [UserController::class, 'showUsers'])->name('user.showUsers');
            Route::get('{accountId}/users/{userId}/edit', [UserController::class, 'editUser'])->name('user.editUser');
            Route::put('{accountId}/users/{userId}', [UserController::class, 'updateUser'])->name('users.updateUser');
            Route::delete('{accountId}/users/{userId}', [UserController::class, 'destroyUser'])->name('account.users.destroy');

            Route::get('/project/website', [AccountController::class, 'accountSiteEdit'])->name('accountSite.edit');
            Route::post('website', [AccountController::class, 'accountSiteUpdate'])->name('accountSite.update');
        });

        //cart
        Route::post('cart/add', [CartHeadController::class, 'addToCart']);
        Route::get('cart', [CartHeadController::class, 'showCart'])->name('showCart');
        Route::delete('cart/remove/{body}', [CartHeadController::class, 'removeFromCart']);
        Route::put('cart/amount/{body}', [CartHeadController::class, 'amount']);
        Route::put('cart/discount/{cart}', [CartHeadController::class, 'discount']);
        Route::put('cart/discount/remove/{cart}', [CartHeadController::class, 'removeDiscount']);

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // Route::get('/customer-login', [CustomerController::class, 'loginForm'])->name('customer.login');
        // Route::get('/completeInfo/{customer_id}', [CheckoutController::class, 'completeInfo'])->name('completeInfo');
    });

    Route::Post('user/create', [AccountController::class, 'newUserAccount'])->name('newUserAccount');
    Route::put('account/activation', [AccountController::class, 'accountusersactivation'])->name('account.activation');

    Route::put('user/activation', [UserController::class, 'accountusersactivation'])->name('account.users.activation');
    Route::post('users', [UserController::class, 'store'])->name('users.store');

    Route::post('/uploadFile', [ApiController::class, 'uploadFile']);

    Route::put('/delete-image', [CategoryController::class, 'deleteImage'])->name('deleteimage');

    Route::put('/delete-product-images', [ProductController::class, 'deleteImage'])->name('deleteproductimage');

    Route::post('/payment-type-to-account', [ShopSettingController::class, 'PaymentTypeToAccount'])->name('PaymentTypeToAccount');
    Route::post('/transport-to-account', [ShopSettingController::class, 'transportToAccount'])->name('transportToAccount');
});

Route::Post('forgotPassword', [AccountController::class, 'forgotPassword'])->name('forgotPassword');
Route::Post('codePassword', [AccountController::class, 'codePassword'])->name('codePassword');
Route::post('/resendCode', [AccountController::class, 'resendCode'])->name('resendCode');

require __DIR__ . '/auth.php';
