<?php

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

// // prison auth routes
require base_path() . '/routes/auth.php';

// // prison my account
Route::group(['middleware' => 'auth'], function () {
    require base_path() . '/routes/prison.php';
});

// Website Routes
require base_path() . '/routes/website.php';

// Admin Routes
require base_path() . '/routes/admin.php';
