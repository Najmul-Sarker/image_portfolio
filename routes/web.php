<?php

use App\Http\Controllers\backend\CategoryController as BackendCategoryController;
use App\Http\Controllers\backend\HomeController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

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

Route::get('/admin',[HomeController::class,'index'])->name('admin.index');

Route::get('/admin/category',[BackendCategoryController::class,'index'])->name('category.index');
Route::get('/admin/category/create',[BackendCategoryController::class,'create'])->name('category.create');
Route::get('/admin/category/store',[BackendCategoryController::class,'store'])->name('category.store');
Route::get('/admin/category/show',[BackendCategoryController::class,'show'])->name('category.show');
Route::get('/admin/category/edit',[BackendCategoryController::class,'edit'])->name('category.edit');
Route::get('/admin/category/update',[BackendCategoryController::class,'update'])->name('category.update');
Route::get('/admin/category/delete',[BackendCategoryController::class,'delete'])->name('category.delete');
