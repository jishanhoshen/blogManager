<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
Auth::routes();

Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
    });

Route::get('test', function () {
    echo '<pre>';
    print_r(Auth::user());
    echo '</pre>';
    if(Hash::check('nopassword', Auth::user()->password )){
        dd(Auth::user()->email);
    }
});

Route::get('/', function () {
    return view('blog/home');
});

Route::prefix('auth')->group(function () {
    Route::get('login', function () {
        return view('auth.login');
    });
    Route::get('redirect/{provider}', [LoginController::class, 'redirectToSocial'])->name('redirect');
    Route::get('callback/{provider}', [LoginController::class, 'handleCallback']);
});

Route::prefix('admin')->group(function () {
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

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
