<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
 Route::get('dashboard',[DashboardController::class,'index']);
 //category routes
//  Route::resource('category',CategoryController::class);
Route::controller(CategoryController::class)->group(function(){
 Route::get('category','index');
 Route::get('category/create','create');
 Route::post('category/store','store');
 Route::get('category/{category}/edit','edit');
 Route::put('category/update/{category_id}','update');
});

Route::controller(ProductController::class)->group(function(){
Route::get('products','index');
Route::get('products/create','create');
Route::post('products','store');
Route::get('products/{product}/edit','edit');
});

Route::get('/brand',App\Http\Livewire\Admin\Brand\index::class);

});


