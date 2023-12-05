<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ResearchController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::get('/clear', [HomeController::class, 'clear']);

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [HomeController::class, 'index'])->name('index');

        // Route::middleware(['auth.redirect'])->group(function () {
        Route::middleware(['auth'])->group(function () {
            Route::get('/request-research', [OrderController::class, 'orderResearch'])->name('request-research');
            Route::post('/add-request-research', [OrderController::class, 'storeOrder']);
        });

        Route::controller(UserController::class)->group(function () {
            // Route::get('/sign-up', 'viewSignUp')->name('sign-up');
            Route::post('/register', 'register');
            // Route::get('/sign-in', 'viewSignIn')->name('sign-in');
            Route::post('/login', 'login');
            Route::post('/logout', 'logout')->name('logout');
        });
    }
);

// admin

Route::prefix('admin-panel-management')->group(function () {
    Route::middleware(['auth:admin'])->group(function () {

        Route::get('/requests', [AdminOrderController::class, 'researchRequests']);

        Route::controller(ResearchController::class)->group(function () {
            Route::get('/researches', 'researches');
            Route::get('/research/{id}/details', 'viewResearch');
            Route::get('/research/add', 'viewCreateResearch');
            Route::post('/research/store', 'addResearch');
            Route::delete('/research/{id}/delete', 'deleteResearch')->name('delete-research');
            Route::get('/research/{id}/edit', 'viewUpdateResearch');
            Route::put('/research/{id}/update', 'editResearch');
        });

        Route::get('/users', [UserController::class, 'getAllUsers']);

        Route::controller(AdminController::class)->group(function () {
            Route::get('/', 'redirectToDashboard');
            Route::get('/dashboard', 'dashboard')->name('dashboard');
            Route::post('/logout', 'logout')->name('admin-logout');
        });

        Route::get('/users', [UserController::class, 'users']);
        Route::get('/user/{id}/details', [UserController::class, 'userDetails']);
        Route::get('/user/add', [UserController::class, 'viewAddUser']);
        Route::post('/user/store', [UserController::class, 'storeUser']);
        Route::get('/user/{id}/edit', [UserController::class, 'viewUpdateUser']);
        Route::put('/user/{id}/update', [UserController::class, 'updateUser']);
        Route::delete('/user/{id}/delete', [UserController::class, 'deleteUser'])->name('delete-user');
    });

    Route::controller(AdminController::class)->group(function () {
        Route::get('/sign-in', 'viewSignIn')->name('admin-sign-in');
        Route::post('/login', 'login');
    });
});

// analytics
Route::get('/analytics', function () {
    return view('pages.dashboard.analytics');
});

// Route::get('/test', function () {
//     return "test";
// })->middleware('auth');

// Route::get('/test2', function () {
//     return "test";
// })->middleware('auth:admin');
