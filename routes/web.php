<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Row;
use Laravel\Socialite\Facades\Socialite;

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
Route::get('test',function ()
{

});

Route::get('/', function () {
    return view('blog/home');
});

Route::prefix('auth')->group(function () {
    Route::get('login', function () {
        return view('admin.login');
    });
    Route::post('login',function ()
    {
        
    })->name('login');
    Route::get('google', [LoginController::class, 'redirectToGoogle'])->name('google');
    Route::get('callback', [LoginController::class, 'handleGoogleCallback']);
});

Route::prefix('admin')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::prefix('post')->group(function () {
        Route::get('manage', function () {
            return view('admin.post');
        })->name('post_manage');
        Route::get('recycle', function () {
            return view('admin.recycle');
        })->name('post_recycle');
    });

    Route::prefix('user')->group(function () {
        Route::get('active', [UserController::class, 'index'])->name('active_user');
        Route::get('blocked', [UserController::class, 'blocked'])->name('blocked_user');
    });
});
