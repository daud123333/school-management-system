<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

//Admin Routes
Route::get('/admin/logout', [AdminController::class,'logout'])->name('admin.logout');


//all user managements Roues
Route::prefix('users')->group(function(){
    Route::get('/view', [UserController::class,'userView'])->name('user.view');
    Route::get('/add', [UserController::class,'addUser'])->name('add.user');
    Route::post('/store', [UserController::class,'storeUser'])->name('store.user');
    Route::get('/edit/{id}', [UserController::class,'editUser'])->name('edit.user');
    Route::post('/update/{id}', [UserController::class,'updateUser'])->name('update.user');
    Route::get('/delete/{id}', [UserController::class,'deleteUser'])->name('delete.user');
});


//User profile and Change Password Roues
Route::prefix('profile')->group(function(){
    Route::get('/view', [ProfileController::class,'viewProfile'])->name('view.profile');
    Route::get('/edit', [ProfileController::class,'editProfile'])->name('edit.profile');
    Route::post('/update', [ProfileController::class,'updateProfile'])->name('update.profile');
    Route::get('passwordview', [ProfileController::class,'editPassword'])->name('view.password');
    Route::post('/changepassword', [ProfileController::class,'changePassword'])->name('change.password');


});
