<?php

use App\Http\Controllers\ExtController;
use App\Http\Controllers\Prison\AccountController;
use App\Http\Controllers\Prison\DidController;
use App\Http\Controllers\Prison\PrisonController;
use App\Http\Controllers\Stripe\StripeController;
use Illuminate\Support\Facades\Route;


// prison routes after login
Route::get('/user/dashboard', [PrisonController::class, 'dashboard'])->name('prison.dashboard');
// did purchase routes
Route::group(['prefix' => 'user/did', 'as' => 'prison.did.'], function () {
    Route::get('/', [DidController::class, 'index'])->name('index');
    Route::get('/cities', [DIDController::class, 'cities'])->name('cities');
    Route::get('/cities/{city}/dids', [DIDController::class, 'dids'])->name('dids');
    Route::get('/{did}/purchase', [DIDController::class, 'purchase'])->name('purchase');
    Route::delete('/{order}/delete', [DIDController::class, 'delete'])->name('delete');
});
// Extension Routes
Route::group(['prefix' => 'user/extension', 'as' => 'prison.extension.'], function () {
    Route::get('/', [PrisonController::class, 'extensions'])->name('index');
    Route::post('/', [ExtController::class, 'addExtensionWeb'])->name('add');
});

// voice mail
Route::get('/user/voicemail', [VoiceMailController::class, 'index'])->name('prison.config.voicemail');
Route::post('/user/voicemail', [VoiceMailController::class, 'addVoiceMail'])->name('prison.voicemail.add');
Route::get('/user/voicemail/{id}/edit', [VoiceMailController::class, 'edit'])->name('prison.voicemail.edit');
Route::put('/user/voicemail/{id}/edit', [VoiceMailController::class, 'update'])->name('prison.voicemail.update');
Route::delete('/user/voicemail/{id}/delete', [VoiceMailController::class, 'delete'])->name('prison.voicemail.delete');

Route::get('/user/daynight', [ConfigController::class, 'daynight'])->name('prison.config.daynight');
Route::get('/user/ivr', [ConfigController::class, 'ivr'])->name('prison.config.ivr');

Route::get('/user/call/history', [PrisonController::class, 'callHistory'])->name('prison.callhistory');
Route::post('/user/call/history', [PrisonController::class, 'callHistorySearch'])->name('prison.callhistory.search');

Route::get('/user/account', [PrisonController::class, 'account'])->name('user.account');
Route::get('/user/setting', [PrisonController::class, 'setting'])->name('user.setting');
Route::put('/user/setting/update-password', [PrisonController::class, 'updatePassword'])->name('user.setting.password');
Route::put('/user/setting/update-details', [PrisonController::class, 'updateDetails'])->name('user.setting.details');

Route::get('/user/buymore', [PrisonController::class, 'buymore'])->name('user.buymore');
Route::get('/user/orders', [PrisonController::class, 'accounts'])->name('user.orders');
Route::get('/user/usage', [PrisonController::class, 'usage'])->name('user.usage');
Route::get('/user/expiry', [PrisonController::class, 'expiry'])->name('user.expiry');

// My Account
Route::get('/user/myaccount', [AccountController::class, 'myAccount'])->name('prison.myaccount');
Route::get('/user/myaccount/update', [AccountController::class, 'editAccount'])->name('prison.account.edit');
Route::get('/user/myaccount/update/password', [AccountController::class, 'editPassword'])->name('prison.account.password');
// Payment Routes
Route::group(['prefix' => 'user/payment', 'as' => 'prison.payment.'], function () {
    Route::get('/{purchase}', [StripeController::class, 'index'])->name('index');
    Route::post('/{purchase}/stripe-payment', [StripeController::class, 'paymentSave'])->name('stripe');
});
