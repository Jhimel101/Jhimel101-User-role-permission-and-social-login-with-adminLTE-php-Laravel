<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

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
    return view('welcome');
})->name('welcome');

Route::get('about', function() {
    return view('about');
})->name('about');

Route::get('faq', function(){
    return view('faq');
})->name('faq');

Route::get('providermyprofile', function(){
    return view('providermyprofile');
})->name('providermyprofile');

Route::get('customermyprofile', function(){
    return view('customermyprofile');
})->name('customermyprofile');

Route::get('adminprofile', function(){
    return view('adminprofile');
})->name('adminprofile');
Route::get('eventcategory', function(){
    return view('eventcategory');
})->name('eventcategory');





Auth::routes();
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::get('/home', [HomeController::class, 'index'])->name('home');
//Route::get('about', [HomeController::class, 'about'])->name('about');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});
