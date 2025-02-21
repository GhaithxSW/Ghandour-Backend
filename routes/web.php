<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group that
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

    }
);

// Authentication
Route::prefix('dashboard')->group(function () {
    Route::get('/sign-in', [AuthController::class, 'viewSignIn'])->name('dashboard.sign-in');
    Route::post('/login', [AuthController::class, 'login'])->name('dashboard.login');
    Route::get('/sign-up', [AuthController::class, 'viewSignUp'])->name('dashboard.sign-up');
    Route::post('/register', [AuthController::class, 'register'])->name('dashboard.register');
    Route::post('/logout', [AuthController::class, 'logout'])->name('dashboard.logout');
});

// Authenticated Routes for Dashboard
Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/home', [DashboardController::class, 'home'])->name('dashboard.home');

    // User Profile
    Route::get('/profile', [DashboardController::class, 'profile']);
    Route::put('/updateProfile', [DashboardController::class, 'updateProfile']);

    Route::get('/getAllUsers', [UserController::class, 'getAllUsers'])->name('dashboard.getAllUsers');

    // Game Management
    Route::get('/supported-games', [DashboardController::class, 'supportedGames'])->name('dashboard.supported-games');
    Route::get('/learned-games', [DashboardController::class, 'learnedGames'])->name('dashboard.learned-games');
    Route::get('/progress', [DashboardController::class, 'progress'])->name('dashboard.progress');

    // Update Game Status
    Route::post('/updateSupportedGames', [DashboardController::class, 'updateSupportedGames'])->name('dashboard.updateSupportedGames');
    Route::post('/updateLearnedGames', [DashboardController::class, 'updateLearnedGames'])->name('dashboard.updateLearnedGames');

    // Additional Features
    Route::post('/addScenesToSupported', [DashboardController::class, 'addScenesToSupported'])->name('dashboard.addScenesToSupported');

    // User Management
    Route::get('/users', [UserController::class, 'users']);
    Route::get('/user/{userId}/details', [UserController::class, 'userDetails']);
    Route::get('/user/add', [UserController::class, 'viewAddUser']);
    Route::post('/user/store', [UserController::class, 'storeUser']);
    Route::get('/user/{userId}/edit', [UserController::class, 'viewUpdateUser']);
    Route::put('/user/{userId}/update', [UserController::class, 'updateUser']);
    Route::post('/user/{userId}/delete', [UserController::class, 'deleteUser'])->name('delete-user');

    // Admin Management
    Route::get('/admins', [AdminController::class, 'admins']);
    Route::get('/admin/{adminId}/details', [AdminController::class, 'adminDetails']);
    Route::get('/admin/add', [AdminController::class, 'viewAddAdmin']);
    Route::post('/admin/store', [AdminController::class, 'storeAdmin']);
    Route::get('/admin/{adminId}/details', [AdminController::class, 'viewUpdateAdmin']);
    Route::put('/admin/{adminId}/update', [AdminController::class, 'updateAdmin']);
    Route::post('/admin/{adminId}/delete', [AdminController::class, 'deleteAdmin'])->name('delete-admin');
});
