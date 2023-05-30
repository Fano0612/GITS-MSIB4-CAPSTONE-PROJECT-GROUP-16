<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductListController;
use App\Http\Controllers\Balancesheetcontroller;

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

Route::get('/homepage', function () {
    return view('homepage');
})->name('homepage');

Route::get('/forgot_password', function () {
    return view('forgot_password');
})->name('forgot_password');

Route::get('/generate_invoice', function () {
    return view('generate_invoice');
})->name('generate_invoice');

Route::get('/transaction_list', function () {
    return view('transaction_list');
})->name('transaction_list');

Route::get('/edit_profile', function () {
    return view('edit_profile');
})->name('edit_profile');

Route::get('/productlist', [ProductListController::class, 'index'])->name('productlist');



Route::get('register', [UserController::class, 'register'])->name('register');
Route::POST('register', [UserController::class, 'registeracc'])->name('registeracc');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::POST('login', [UserController::class, 'loginacc'])->name('loginacc');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::get('AccountExist', [UserController::class, 'AccountExist'])->name('AccountExist');
Route::get('AccountUnexist', [UserController::class, 'AccountUnexist'])->name('AccountUnexist');
Route::POST('forgotPassword', [UserController::class, 'forgotPassword'])->name('forgotPassword');
Route::get('/editprofile', [UserController::class, 'editProfile'])->name('editprofile');
Route::post('/updateprofile', [UserController::class, 'updateProfile'])->name('updateprofile');



Route::get('/product_menu', [ProductController::class, 'index'])->name('product_menu');
Route::post('/insertproduct', [ProductController::class, 'insertproduct'])->name('insertproduct');
Route::get('/showproduct/{product_id}', [ProductController::class, 'showproduct'])->name('showproduct');
Route::post('/editproduct/{product_id}', [ProductController::class, 'editproduct'])->name('editproduct');
Route::get('/deleteproduct/{product_id}', [ProductController::class, 'deleteproduct'])->name('deleteproduct');
Route::post('/buyProduct', [App\Http\Controllers\ProductController::class, 'buyProduct'])->name('buyproduct');
Route::get('/showProductCart', [App\Http\Controllers\ProductController::class, 'showProductCart'])->name('showProductCart');
Route::post('/incrementProductCart', [App\Http\Controllers\ProductController::class, 'incrementProductCart'])->name('incrementProductCart');
Route::post('/decrementProductCart', [App\Http\Controllers\ProductController::class, 'decrementProductCart'])->name('decrementProductCart');
Route::delete('/removeProductCart/{id}', [App\Http\Controllers\ProductController::class, 'removeProductCart'])->name('removeProductCart');
Route::post('/paymentProductCart', [App\Http\Controllers\ProductController::class, 'paymentProductCart'])->name('paymentProductCart');
Route::get('/viewProductTransaction/{transactionId}', [ProductController::class, 'viewProductTransaction'])->name('viewProductTransaction');
Route::get('/printTransaction/{transactionId}', [ProductController::class, 'printTransaction'])->name('printTransaction');


Route::get('/category', [CategoryController::class, 'create'])->name('category');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('/balance_sheet', [Balancesheetcontroller::class, 'index'])->name('balance_sheet');
Route::post('/insertTransaction', [Balancesheetcontroller::class, 'insertTransaction'])->name('insertTransaction');
Route::get('/showTransaction/{id}', [Balancesheetcontroller::class, 'showTransaction'])->name('showTransaction');
Route::put('/editTransaction/{id}', [Balancesheetcontroller::class, 'editTransaction'])->name('editTransaction');
Route::get('/deleteTransaction/{id}', [Balancesheetcontroller::class, 'deleteTransaction'])->name('deleteTransaction');
