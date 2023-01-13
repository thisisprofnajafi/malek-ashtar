<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Controllers\NotificationController;

Route::middleware('auth', 'admin')->prefix('adminity')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    // Notification read all
    Route::get('/notification/read-all', [NotificationController::class, 'readAll'])->name('admin.notification.read-all');

});
