<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Home\HomeController;
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
Route::get('/',[HomeController::class,'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
 Route::get('dashboard',[DashboardController::class,'index']);
 //category routes
//  Route::resource('category',CategoryController::class);
Route::controller(SliderController::class)->group(function(){
    Route::get('sliders','index');
    Route::get('sliders/create','create');
    Route::post('sliders/create','store');
    Route::get('/sliders/{slider}/edit','edit');
    Route::put('/sliders/{slider}','update');
    Route::delete('/sliders/{slider}/delete','destroy');
});
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
Route::put('products/{product}','update');
Route::get('product-image/{product_image_id}/delete','deleteImage');
Route::get('products/{product}/delete','delete');
Route::put('product-color/{prodColorId}','updateColorQty');
Route::delete('product-color/{prodColorId}','deleteProdColor');
});


Route::controller(ColorController::class)->group(function(){
Route::get('colors','index');
Route::get('colors/create','create');
Route::post('colors/store','store');
Route::get('colors/{color}/edit','edit');
Route::put('colors/{color}','update');
Route::delete('colors/{color}/delete','destroy');
});




Route::get('/brand',App\Http\Livewire\Admin\Brand\index::class);

});


