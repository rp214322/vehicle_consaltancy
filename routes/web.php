<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about',[\App\Http\Controllers\HomeController::class,'about'])->name('about');
Route::get('/contact',[\App\Http\Controllers\HomeController::class,'contact'])->name('contact');
Route::get('/vehicals',[\App\Http\Controllers\VehicalsController::class,'index'])->name('vehicals.list');
Route::get('/vehical/{slug}',[\App\Http\Controllers\VehicalsController::class,'show'])->name('vehical.show');
Route::post('/vehical/inquiry',[App\Http\Controllers\VehicalsController::class,'StoreInquiry'])->name('vehical.inquiry');
Route::post('/inquiry',[App\Http\Controllers\HomeController::class,'StoreInquiry'])->name('store.inquiry');
Route::get('/favouite/vehical/{id}',[App\Http\Controllers\VehicalsController::class,'FavouriteVehical'])->name('favourite.vehical');
Route::get('/favouite/vehical',[App\Http\Controllers\UsersController::class,'FavouriteList'])->name('favourite.list');
Route::get('/profile',[\App\Http\Controllers\UsersController::class,'profile'])->name('profile');
Route::post('/profile',[App\Http\Controllers\UsersController::class,'updateProfile'])->name('update.profile');
Route::get('fetch',[\App\Http\Controllers\Admin\VehicalsController::class,'fetch'])->name('fetchData');

//Admin Section
Route::get('admin/login',[\App\Http\Controllers\Admin\AuthController::class,'getLogin'])->name('admin.login');
Route::post('admin/login',[\App\Http\Controllers\Admin\AuthController::class,'postLogin'])->name('admin.post.login');
Route::get('admin/forgotpassword',[\App\Http\Controllers\Admin\AuthController::class,'getPassword'])->name('admin.forgotpassword');

Route::middleware('admin')->prefix('admin')->name('admin.')->group(function(){

	Route::get('/',[\App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard');

	// Route for profile
	Route::get('profile',[\App\Http\Controllers\Admin\AuthController::class,'getProfile'])->name('profile');
	Route::post('profile',[\App\Http\Controllers\Admin\AuthController::class,'postProfile'])->name('post.profile');

	// Route for Change Password
	Route::get('password',[\App\Http\Controllers\Admin\AuthController::class,'getPassword'])->name('password');
	Route::post('password',[\App\Http\Controllers\Admin\AuthController::class,'postPassword'])->name('post.password');

	// Route for Setting
    Route::get('settings',[\App\Http\Controllers\Admin\DashboardController::class,'settings'])->name('setting');
    Route::post('settings',[\App\Http\Controllers\Admin\DashboardController::class,'post_settings'])->name('post.setting');

    Route::resource('users',\App\Http\Controllers\Admin\UsersController::class);
    Route::post('users/status',[\App\Http\Controllers\Admin\UsersController::class,'updateStatus'])->name('users.status');

    Route::resource('categories',\App\Http\Controllers\Admin\CategoriesController::class);

    Route::resource('brands',\App\Http\Controllers\Admin\BrandsController::class);

    Route::resource('models',\App\Http\Controllers\Admin\ModelsController::class);

    Route::resource('vehicals',\App\Http\Controllers\Admin\VehicalsController::class);
    Route::post('vehicals/status',[\App\Http\Controllers\Admin\VehicalsController::class,'updateStatus'])->name('vehicals.status');

    Route::resource('vehical.galleries',\App\Http\Controllers\Admin\VehicalGalleriesController::class);

    Route::resource('inquiries',\App\Http\Controllers\Admin\InquiriesController::class);
    Route::post('inquiries/status',[\App\Http\Controllers\Admin\InquiriesController::class,'updateStatus'])->name('inquiries.status');

	// Route for Logout
	Route::post('logout',[\App\Http\Controllers\Admin\AuthController::class,'getLogout'])->name('admin.logout');

});
