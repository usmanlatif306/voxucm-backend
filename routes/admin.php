<?php

use App\Http\Controllers\Admin\AAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminExtensionController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PromoController;
use App\Http\Controllers\Content\AboutController;
use App\Http\Controllers\Content\FaqController;
use App\Http\Controllers\Content\FeatureController;
use App\Http\Controllers\Content\HomeController;
use App\Http\Controllers\Content\ServiceController;
use App\Http\Controllers\Content\TestController;
use App\Http\Controllers\Content\WorkController;
use App\Http\Controllers\Prison\UserPlanController;
use Illuminate\Support\Facades\Route;

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
Route::group(['middleware' => 'admin', 'prefix' => '/admin'], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::put('/users/{user}', [AdminController::class, 'editStatus'])->name('admin.userstatus');
    Route::get('/users/{user}/details', [AdminController::class, 'userDetails'])->name('admin.userdetails');
    Route::resource('admins', AdminUserController::class);
    Route::post('/csv', [AdminController::class, 'csv'])->name('admin.csv');


    // admin orders routes
    Route::group(['prefix' => '/orders', 'as' => 'admin.orders.'], function () {

        Route::get('/did', [AdminController::class, 'didOrders'])->name('did');
        Route::get('/peckage', [AdminController::class, 'planOrders'])->name('plan');
        Route::put('/edit-order/{order}', [AdminController::class, 'editOrder'])->name('editorder');
    });

    // Peckages routes
    Route::group(['prefix' => '/home', 'as' => 'admin.'], function () {
        Route::resource('/products', ProductController::class);
        // Route::get('/peckages', [ProductController::class, 'index'])->name('peckage');
        // Route::get('/peckages/{product}', [ProductController::class, 'update'])->name('peckage.edit');
        // Route::put('/peckages/{product}', [ProductController::class, 'update'])->name('peckage.update');
    });

    // user plans
    Route::get('/plans', [UserPlanController::class, 'plans'])->name('admin.plans');
    // Routes for content
    Route::get('/content/home', [HomeController::class, 'index'])->name('content.home');
    Route::post('/content/navbar/{home}', [HomeController::class, 'navlogo'])->name('content.nav.update');
    Route::post('/content/home/{home}', [HomeController::class, 'update'])->name('content.home.update');
    Route::post('/content/contact/{contact}', [HomeController::class, 'contactUpdate'])->name('content.contact.update');
    Route::post('/content/newsletter/{news}', [HomeController::class, 'newsletter'])->name('content.news.update');
    Route::post('/content/testcall/{call}', [HomeController::class, 'testcall'])->name('content.call.update');


    Route::get('/content/feature', [FeatureController::class, 'index'])->name('content.feature');
    Route::post('/content/feature/{feature}', [FeatureController::class, 'update'])->name('content.feature.update');
    Route::get('/content/service', [ServiceController::class, 'index'])->name('content.service');
    Route::post('/content/service/{service}', [ServiceController::class, 'update'])->name('content.service.update');
    Route::get('/content/faq', [FaqController::class, 'index'])->name('content.faq');
    Route::post('/content/faq/{faq}', [FaqController::class, 'update'])->name('content.faq.update');

    Route::post('/content/test/{test}', [TestController::class, 'update'])->name('content.test.update');
    Route::get('/content/about', [AboutController::class, 'index'])->name('content.about');
    Route::post('/content/about/{about}', [AboutController::class, 'update'])->name('content.about.update');
    Route::get('/content/how-it-work', [WorkController::class, 'index'])->name('content.work');
    Route::post('/content/how-it-work/{work}', [WorkController::class, 'update'])->name('content.work.update');

    // promo codes and discount
    Route::group(['as' => 'admin.'], function () {
        Route::resource('promos', PromoController::class);
    });

    // Admin Extensions routes
    Route::get('/extensions', [AdminExtensionController::class, 'index'])->name('admin.extensions');
    Route::get('/extensions/{id}', [AdminExtensionController::class, 'show'])->name('admin.extensions.show');
    Route::post('/extensions/did', [AdminExtensionController::class, 'saveDid'])->name('admin.extensions.did');
});
