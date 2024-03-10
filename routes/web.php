<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\permissionController;
use App\Http\Controllers\EnqueryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;



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

// ------------------------web Site Route--------------------------------------------

Route::get('/', [HomeController::class, 'index']);
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::Post('store', [EnqueryController::class, 'store'])->name('store');

// -------Admin Route Start --------------------------------------------------------

Route::get('admin', [LoginController::class, 'index'])->name('login');
Route::post('admin.login', [LoginController::class, 'login'])->name('login.post');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource("user", UserController::class);
    Route::resource("slider", SliderController::class);
    Route::resource("page", PageController::class);
    Route::post('ckeditor/upload', [PageController::class, 'upload'])->name('ckeditor.upload');

    Route::resource('blog', BlogController::class);
    Route::resource('role', RoleController::class);
    Route::resource('permission', permissionController::class);
    Route::get('enquery', [EnqueryController::class, 'index'])->name('enquery');
    Route::Post('enquery-status', [EnqueryController::class, 'status'])->name('enquery-status');
    Route::delete('enquery-destroy/{id}', [EnqueryController::class, 'destroy'])->name('enquery-destroy');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

// -------Admin Route End --------------------------------------------------------

// -----------------------------web Site Dynamic page route--------------------- Dynamic route end me likhe
Route::get('/{urlKey}', [HomeController::class, 'page'])->name('page');


