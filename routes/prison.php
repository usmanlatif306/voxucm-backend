<?php

use App\Http\Controllers\Prison\DidController;
use App\Http\Controllers\Prison\PrisonController;
use Illuminate\Support\Facades\Route;


// prison routes after login
Route::get('/user/dashboard', [PrisonController::class, 'dashboard'])->name('prison.dashboard');
// did routers
Route::group(['prefix' => 'user/did', 'as' => 'prison.did.'], function () {
    Route::get('/', [DidController::class, 'index'])->name('index');
    Route::get('/countries', [DIDController::class, 'countries'])->name('country');
    Route::get('/countries/{country}/cities', [DIDController::class, 'cities'])->name('cities');
    Route::get('/cities/{city}/dids', [DIDController::class, 'dids'])->name('dids');
    Route::get('/{did}/purchase', [DIDController::class, 'purchase'])->name('purchase');
    Route::delete('/{purchase}', [DIDController::class, 'delete'])->name('delete');
});

Route::get('/user/account', [PrisonController::class, 'account'])->name('user.account');
Route::get('/user/setting', [PrisonController::class, 'setting'])->name('user.setting');
Route::put('/user/setting/update-password', [PrisonController::class, 'updatePassword'])->name('user.setting.password');
Route::put('/user/setting/update-details', [PrisonController::class, 'updateDetails'])->name('user.setting.details');
Route::get('/user/buymore', [PrisonController::class, 'buymore'])->name('user.buymore');
Route::get('/user/orders', [PrisonController::class, 'accounts'])->name('user.orders');
Route::get('/user/usage', [PrisonController::class, 'usage'])->name('user.usage');
Route::get('/user/expiry', [PrisonController::class, 'expiry'])->name('user.expiry');
