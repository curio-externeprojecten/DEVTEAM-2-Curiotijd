<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AchievementsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\tasksController;
use App\Http\Controllers\verifyController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

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
Route::middleware(["auth"])->group(function(){

    // dashboard 
    Route::get('dashboard', [UserController::Class, 'levelSysteem']); 
    
    Route::get('/logout', function(){
        Auth::logout();
        return Redirect::to('login');
     });

     Route::get('account', function () {
        return view('account');
    });

    Route::post('achievements.insert', [AchievementsController::class, 'store']);
    Route::get('achievements.insert', [AchievementsController::class, 'insert']);
    Route::get('achievements.index', [AchievementsController::class, 'index']);
    Route::get('achievements.index/{id}', [AchievementsController::class, 'show'])->name("achievements.show");

    Route::get('user', [userController::class, 'levelSysteem']);
    Route::post('createTask', [UserController::class, 'createTask']);

    Route::get('docentDashboard', [verifyController::class, 'selectUnverifiedAccounts'])->name('docentDashboard');

    Route::get('tasks', function () {
        return view('tasks');
    });

    Route::get('overzicht/{id}', [tasksController::class, 'overzicht'])->name('overzicht.overzicht');
    
    Route::put('verify/{id}', [UserController::class, 'verifyUser'])->name('user.verify');
    Route::put('DontVerify/{id}', [UserController::class, 'dontVerifyUser'])->name('user.dontVerify');
});
Route::post('register', [RegisteredUserController::class, 'store'])
                ->middleware('guest');
            
Route::get('/', function () {
    return view('auth.login');
});