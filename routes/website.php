<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\Content\AboutController;
use App\Http\Controllers\Content\FaqController;
use App\Http\Controllers\Content\FeatureController;
use App\Http\Controllers\Content\HomeController;
use App\Http\Controllers\Content\ServiceController;
use App\Http\Controllers\Content\WorkController;
use App\Http\Controllers\OrderController;
use App\Models\Content\Contact;
use App\Models\Content\Product;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'home'])->name('prison.home');

Route::get('/about-us', [AboutController::class, 'about'])->name('prison.about');

Route::get('/features', [FeatureController::class, 'features'])->name('prison.features');

Route::get('/pricing', function () {
    $products = Product::where('status', true)->get();
    return view('prison.pricing', compact('products'));
})->name('prison.pricing');

Route::get('/how-it-works', [WorkController::class, 'works'])->name('prison.works');

Route::get('/faq', [FaqController::class, 'faqs'])->name('prison.support');

Route::get('/services', [ServiceController::class, 'services'])->name('prison.services');

Route::get('/contact', function () {
    $contact = Contact::get()->first();
    return view('prison.contact', compact('contact'));
})->name('prison.contact');

Route::get('/user/cart', [CartController::class, 'cart'])->name('prison.cart');
Route::post('/cart/save', [CartController::class, 'saveRecords'])->name('prison.cartsave');
// apply promo code to cart
Route::post('coupon/apply', [CartController::class, 'promo'])->name('prison.promo');

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
