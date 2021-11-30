<?php

use App\Http\Controllers\Admin\AAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Content\AboutController;
use App\Http\Controllers\Content\FaqController;
use App\Http\Controllers\Content\FeatureController;
use App\Http\Controllers\Content\HomeController;
use App\Http\Controllers\Content\ProductController;
use App\Http\Controllers\Content\ServiceController;
use App\Http\Controllers\Content\TestController;
use App\Http\Controllers\Content\WorkController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PrisonController;
use App\Models\content\Contact;
use App\Models\content\Product;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return "Storage link established";
});
Route::get('/cache-clear', function () {
    Artisan::call('cache:clear');
    return "Cache is clear";
});
Route::get('/config-clear', function () {
    Artisan::call('config:clear');
    return "Config is clear";
});
// Auth Routes
// Auth::routes();
// Prison Auth
Route::get('/register', [RegisterController::class, 'register'])->name('prison.register')->middleware('guest');
Route::post('/register', [RegisterController::class, "registerUser"])->name('prison.registeruser');

Route::get('/login', [LoginController::class, 'loginForm'])->name('prison.login')->middleware('guest');
Route::post('/login', [LoginController::class, "loginUser"])->name('prison.loginuser');


Route::get('/account/verification', [VerificationController::class, 'verification'])->name('prison.verify');

// verify User
Route::get('account/verify/{token}', [VerificationController::class, 'verifyAccount'])->name('user.verify');

Route::post('send-email-token-again', [VerificationController::class, 'resendToken'])->name('user.reverify');
// forget password
Route::get('/forget-password', [ForgotPasswordController::class, 'forgetPasswordView'])->name('prison.forgetView');
Route::post('/forget-password', [ForgotPasswordController::class, 'forgetPassword'])->name('prison.forget');
// reset password
Route::get('/reset-password', [ResetPasswordController::class, 'resetView'])->name('prison.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('prison.update');
// logout
Route::get('/logout', [PrisonController::class, 'logout'])->name('prison.logout')->middleware('auth');

// // prison my account
Route::group(['middleware' => 'auth'], function () {
    Route::post('/user/phone', [VerificationController::class, 'sendOTP'])->name('prison.mobile');
    Route::get("/user/verify/phone", function () {
        return view('prison.auth.mobile');
    })->name('prison.mobile.show');
    Route::post('/user/verify/phone', [VerificationController::class, 'verifyOTP'])->name('mobile.verify');
    Route::post('/user/verify/phone/resend', [VerificationController::class, 'resendOTP'])->name('prison.mobile.resend');

    Route::get('/user/dashboard', [PrisonController::class, 'dashboard'])->name('prison.dashboard');
    Route::get('/user/setting', [PrisonController::class, 'setting'])->name('user.setting');
    Route::put('/user/setting/update-password', [PrisonController::class, 'updatePassword'])->name('user.setting.password');
    Route::put('/user/setting/update-details', [PrisonController::class, 'updateDetails'])->name('user.setting.details');
    Route::get('/user/buymore', [PrisonController::class, 'buymore'])->name('user.buymore');
    Route::get('/user/accounts', [PrisonController::class, 'accounts'])->name('user.accounts');
    Route::get('/user/usage', [PrisonController::class, 'usage'])->name('user.usage');
    Route::get('/user/expiry', [PrisonController::class, 'expiry'])->name('user.expiry');
});



// prison main routes
Route::get('/', [HomeController::class, 'home'])->name('prison.home');

Route::get('/about-us', [AboutController::class, 'about'])->name('prison.about');

Route::get('/features', [FeatureController::class, 'features'])->name('prison.features');

Route::get('/pricing', function () {
    $products = Product::get();
    return view('prison.pricing', compact('products'));
})->name('prison.pricing');

Route::get('/how-it-works', [WorkController::class, 'works'])->name('prison.works');

Route::get('/faq', [FaqController::class, 'faqs'])->name('prison.support');

Route::get('/services', [ServiceController::class, 'services'])->name('prison.services');

Route::get('/contact', function () {
    $contact = Contact::get()->first();
    return view('prison.contact', compact('contact'));
})->name('prison.contact');

Route::get('/cart', [CartController::class, 'cart'])->name('prison.cart');
Route::post('/cart/save', [CartController::class, 'saveRecords'])->name('prison.cartsave');

Route::get('/terms-conditions', function () {
    return view('prison.terms');
})->name('prison.terms');
Route::get('/privacy-policy', function () {
    return view('prison.privacy');
})->name('prison.privacy');
Route::get('/cancel-policy', function () {
    return view('prison.cancel');
})->name('prison.cancel');
Route::get('/cookies-policy', function () {
    return view('prison.cookie');
})->name('prison.cookie');


// Prison order Routes
Route::post('save-order', [OrderController::class, 'saveOrder'])->name('order.save');
Route::delete('/delete-order/{order}', [OrderController::class, 'deleteOrder'])->name('order.delete');


// Admin Auth
Route::get('/admin/register', [AAuthController::class, 'showregister'])->name('admin.register');
Route::post('/admin/register', [AAuthController::class, 'register'])->name('admin.signup');
Route::get('/admin/login', [AAuthController::class, 'showlogin'])->name('admin.login');
Route::post('/admin/login', [AAuthController::class, 'login'])->name('admin.signin');
Route::get('/admin/forget-password', [AAuthController::class, 'forget'])->name('admin.forget');
Route::post('/admin/forget-password', [AAuthController::class, 'forgetpassword'])->name('admin.forget.sent');
Route::get('/admin/reset-password', [AAuthController::class, 'reset'])->name('admin.reset');
Route::post('/admin/reset-password', [AAuthController::class, 'resetpassword'])->name('admin.password.reset');
Route::get('/admin/logout', [AAuthController::class, 'logout'])->name('admin.logout')->middleware('admin');

// Admin Routes
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::put('/admin/edit-order/{order}', [AdminController::class, 'editOrder'])->name('admin.editorder');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::put('/admin/users/{user}', [AdminController::class, 'editStatus'])->name('admin.userstatus');
    Route::get('/admin/users/{user}/details', [AdminController::class, 'userDetails'])->name('admin.userdetails');

    // Routes for dynamic content
    Route::get('/admin/content/home', [HomeController::class, 'index'])->name('content.home');
    Route::post('/admin/content/navbar/{home}', [HomeController::class, 'navlogo'])->name('content.nav.update');
    Route::post('/admin/content/home/{home}', [HomeController::class, 'update'])->name('content.home.update');
    Route::post('/admin/content/contact/{contact}', [HomeController::class, 'contactUpdate'])->name('content.contact.update');
    Route::post('/admin/content/newsletter/{news}', [HomeController::class, 'newsletter'])->name('content.news.update');
    Route::post('/admin/content/testcall/{call}', [HomeController::class, 'testcall'])->name('content.call.update');


    Route::get('/admin/content/feature', [FeatureController::class, 'index'])->name('content.feature');
    Route::post('/admin/content/feature/{feature}', [FeatureController::class, 'update'])->name('content.feature.update');
    Route::get('/admin/content/service', [ServiceController::class, 'index'])->name('content.service');
    Route::post('/admin/content/service/{service}', [ServiceController::class, 'update'])->name('content.service.update');
    Route::get('/admin/content/faq', [FaqController::class, 'index'])->name('content.faq');
    Route::post('/admin/content/faq/{faq}', [FaqController::class, 'update'])->name('content.faq.update');

    Route::post('/admin/content/test/{test}', [TestController::class, 'update'])->name('content.test.update');
    Route::get('/admin/content/about', [AboutController::class, 'index'])->name('content.about');
    Route::post('/admin/content/about/{about}', [AboutController::class, 'update'])->name('content.about.update');
    Route::get('/admin/content/how-it-work', [WorkController::class, 'index'])->name('content.work');
    Route::post('/admin/content/how-it-work/{work}', [WorkController::class, 'update'])->name('content.work.update');
    Route::get('/admin/content/plans', [ProductController::class, 'index'])->name('content.plans');
    Route::post('/admin/content/plans/{product}', [ProductController::class, 'update'])->name('content.plan.update');
});


// {{
//     asset('admin/assets/libs/chartist/dist/chartist.min.css')
// }}