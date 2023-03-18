<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\ShopController;
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

Route::get('/', function () {
    return view('homeshop');
});
Route::get('/home', function () {
    return view('homeshop');
});

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/product', [DashboardController::class, 'products']);

Route::get('/getlist', [ProductController::class, 'getlist']);
Route::get('/getlistdel', [ProductController::class, 'getlistdel']);

Route::get('/getproduct', [ProductController::class, 'getproducts']);

Route::POST('/addproduct', [ProductController::class, 'addProduct']);
Route::POST('/editproduct', [ProductController::class, 'editProduct']);
Route::POST('/delproduct', [ProductController::class, 'delproduct']);
Route::POST('/restoreproduct', [ProductController::class, 'restoreproduct']);

//cart routes----------------------------------------------------------------
Route::GET('/cart', [CartController::class, 'index']);
//shop routes----------------------------------------------------------------
Route::GET('/shop', [ShopController::class, 'index']);
//products client routes----------------------------------------------------------------
Route::GET('/productdetail', [ProductController::class, 'productsdetail']);


