<?php

use App\Http\Controllers\ExtController;
use App\Http\Controllers\Prison\AccountController;
use App\Http\Controllers\Prison\CallForwardingController;
use App\Http\Controllers\Prison\ConfigController;
use App\Http\Controllers\Prison\DidController;
use App\Http\Controllers\Prison\PrisonController;
use App\Http\Controllers\Prison\ReportController;
use App\Http\Controllers\Prison\UserPlanController;
use App\Http\Controllers\Prison\VoiceMailController;
use App\Http\Controllers\Stripe\StripeController;
use Illuminate\Support\Facades\Route;


// prison routes after login
Route::group(['prefix' => 'user'], function () {
    Route::get('dashboard', [PrisonController::class, 'dashboard'])->name('prison.dashboard');

    // did purchase routes
    Route::group(['prefix' => 'did', 'as' => 'prison.did.'], function () {
        Route::get('/', [DidController::class, 'index'])->name('index');
        Route::get('/cities', [DIDController::class, 'cities'])->name('cities');
        Route::get('/cities/{city}/dids', [DIDController::class, 'dids'])->name('dids');
        Route::get('/{did}/purchase', [DIDController::class, 'purchase'])->name('purchase');
        Route::delete('/{order}/delete', [DIDController::class, 'delete'])->name('delete');
    });
    // Extension Routes
    Route::group(['prefix' => 'extension', 'as' => 'prison.extensions.'], function () {
        Route::get('/', [PrisonController::class, 'extensions'])->name('index');
        Route::post('/', [ExtController::class, 'addExtensionWeb'])->name('add');
    });

    // Live Reports Routes
    Route::group(['prefix' => 'live/reports', 'as' => 'prison.reports.'], function () {
        Route::get('/calls', [ReportController::class, 'calls'])->name('calls');
        Route::get('/onlinesipuser', [ReportController::class, 'onlinesipuser'])->name('onlinesipuser');
    });

    // voice mail
    Route::get('/voicemail', [VoiceMailController::class, 'index'])->name('prison.config.voicemail');
    Route::post('/voicemail', [VoiceMailController::class, 'addVoiceMail'])->name('prison.voicemail.add');
    Route::get('/voicemail/{id}/edit', [VoiceMailController::class, 'edit'])->name('prison.voicemail.edit');
    Route::put('/voicemail/{id}/edit', [VoiceMailController::class, 'update'])->name('prison.voicemail.update');
    Route::delete('/voicemail/{id}/delete', [VoiceMailController::class, 'delete'])->name('prison.voicemail.delete');

    Route::get('/daynight', [ConfigController::class, 'daynight'])->name('prison.config.daynight');
    Route::get('/ivr', [ConfigController::class, 'ivr'])->name('prison.config.ivr');

    Route::get('/call/history', [PrisonController::class, 'callHistory'])->name('prison.callhistory');
    Route::post('/call/history', [PrisonController::class, 'callHistorySearch'])->name('prison.callhistory.search');

    Route::get('/account', [PrisonController::class, 'account'])->name('user.account');
    Route::get('/setting', [PrisonController::class, 'setting'])->name('user.setting');
    Route::put('/setting/update-password', [PrisonController::class, 'updatePassword'])->name('user.setting.password');
    Route::put('/setting/update-details', [PrisonController::class, 'updateDetails'])->name('user.setting.details');

    Route::get('/buymore', [PrisonController::class, 'buymore'])->name('user.buymore');
    Route::get('/orders', [PrisonController::class, 'accounts'])->name('user.orders');
    Route::get('/usage', [PrisonController::class, 'usage'])->name('user.usage');
    Route::get('/expiry', [PrisonController::class, 'expiry'])->name('user.expiry');

    // My Account
    Route::get('/myaccount', [AccountController::class, 'myAccount'])->name('prison.myaccount');
    Route::get('/myaccount/update', [AccountController::class, 'editAccount'])->name('prison.account.edit');
    Route::get('/myaccount/update/password', [AccountController::class, 'editPassword'])->name('prison.account.password');
    // Payment Routes
    Route::group(['prefix' => 'payment', 'as' => 'prison.payment.'], function () {
        Route::get('/{purchase}', [StripeController::class, 'index'])->name('index');
        Route::post('/{purchase}/stripe-payment', [StripeController::class, 'paymentSave'])->name('stripe');
    });

    // User Plan History
    Route::group(['prefix' => 'plans', 'as' => 'prison.plan.'], function () {
        Route::get('/', [UserPlanController::class, 'index'])->name('index');
        // Route::get('/expired', [UserPlanController::class, 'expired'])->name('expire');
    });

    // Call frwarding
    Route::group(['prefix' => 'call/forwarding'], function () {
        Route::get('/', [CallForwardingController::class, 'index'])->name('call_forwarding');
        Route::post('/', [CallForwardingController::class, 'setForwarding'])->name('set_call_forwarding');
        Route::post('/disable', [CallForwardingController::class, 'disableForwarding'])->name('disable_call_forwarding');
    });
});
