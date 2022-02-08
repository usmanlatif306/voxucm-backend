<?php

use App\Http\Controllers\Admin\AAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
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
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::put('/admin/edit-order/{order}', [AdminController::class, 'editOrder'])->name('admin.editorder');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::put('/admin/users/{user}', [AdminController::class, 'editStatus'])->name('admin.userstatus');
    Route::get('/admin/users/{user}/details', [AdminController::class, 'userDetails'])->name('admin.userdetails');


    // Peckages routes
    Route::group(['prefix' => 'admin/home', 'as' => 'admin.'], function () {
        Route::resource('/products', ProductController::class);
        // Route::get('/peckages', [ProductController::class, 'index'])->name('peckage');
        // Route::get('/peckages/{product}', [ProductController::class, 'update'])->name('peckage.edit');
        // Route::put('/peckages/{product}', [ProductController::class, 'update'])->name('peckage.update');
    });

    // user plans
    Route::get('/admin/plans', [UserPlanController::class, 'plans'])->name('admin.plans');
    // Routes for content
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
});
