<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\LogginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('homeshop');
});
Route::get('/home', function () {
    return view('homeshop');
});
Route::get('/lab', function () {
    return view('lab');
});
Route::get('/lab', function () {
    return view('lab');
});Route::get('/userorder', function () {
    return view('pages-home.userOrder');
});
Route::get('/checkout', [CartController::class, 'checkout']);
Route::post('/getcheckout', [CartController::class, 'getcheckout']);


Route::get('/signup',[LogginController::class,'index']);
Route::get('/signin',[LogginController::class,'signin']);
Route::POST('/login',[UserController::class,'login']);
Route::get('/chekk',[UserController::class,'check']);
Route::post('/deluser',[UserController::class,'deluser']);


Route::get('/logout',[UserController::class,'logout']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/product', [DashboardController::class, 'products']);

Route::get('/getlist', [ProductController::class, 'getlist']);
// Route::get('/productdetail', [ProductController::class, 'productDetail']);

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
Route::GET('/productdetail', [ProductController::class, 'productdetail']);
Route::GET('/getoderoneuser', [OrderController::class, 'getoderoneuser']);
Route::GET('/removeoderoneuser', [OrderController::class, 'removeoderoneuser']);




Route::post('/xoamang', [UserController::class, 'xoamang']);
Route::post('/themmang', [UserController::class, 'themmang']);
Route::post('/getedituser', [UserController::class, 'getedituser']);

Route::GET('/getusernone', [UserController::class, 'getusernone']);
Route::GET('/getuser', [UserController::class, 'getuser']);
Route::POST('/getadd', [UserController::class, 'getadd']);
Route::GET('/getoderuser', [OrderController::class, 'getoderuser']);
Route::GET('/pricepermonth', [OrderController::class, 'pricepermonth']);
Route::GET('/auth/facebook/callback',function(){
    return 'loginfacebook';
});
Route::get('/auth/facebook/', function () {
    return Socialite::driver('facebook')->redirect();
});
Route::get('/chinhsach', function () {
    return 'chinhsach';
});




