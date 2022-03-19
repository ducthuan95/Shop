<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryControler;
use App\Http\Controllers\ProductController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => 'category'], function() {
    Route::get('/', [CategoryControler::class, 'index'])->name('listCategory');
    //Thêm
    Route::get('/add', [CategoryControler::class, 'create'])->name('addCategory');
    Route::post('/add', [CategoryControler::class, 'postCreate'])->name('postCreate');
    //Sửa
    Route::get('/edit/{id}', [CategoryControler::class, 'edit'])->name('editCategory');
    Route::post('/edit/{id}', [CategoryControler::class, 'postEdit'])->name('postEdit');
    Route::get('delete/{id}',[CategoryControler::class, 'destroy'])->name('deleteCategory');
});

//Sản Phẩm
Route::group(['prefix' => 'product'], function() {
    Route::get('/', [ProductController::class, 'index'])->name('listProduct');
    //Thêm
    Route::get('/add', [ProductController::class, 'create'])->name('addProduct');
    Route::post('/add', [ProductController::class, 'postCreate'])->name('postProduct');
    //Sửa
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('editProduct');
    Route::post('/edit/{id}', [ProductController::class, 'postEdit'])->name('edit');
    Route::get('delete/{id}',[ProductController::class, 'destroy'])->name('deleteProduct');
});