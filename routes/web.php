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

//Routes for admin category

Route::get('/admin',[HomeController::class,'index'])->name('admin.index');

Route::get('/admin/category',[BackendCategoryController::class,'index'])->name('category.index');
Route::get('/admin/category/create',[BackendCategoryController::class,'create'])->name('category.create');
Route::post('/admin/category/store',[BackendCategoryController::class,'store'])->name('category.store');
Route::get('/admin/category/show{category}',[BackendCategoryController::class,'show'])->name('category.show');
Route::get('/admin/category/edit{category}',[BackendCategoryController::class,'edit'])->name('category.edit');
Route::patch('/admin/category/update/{category}',[BackendCategoryController::class,'update'])->name('category.update');
Route::delete('/admin/category/delete{category}',[BackendCategoryController::class,'delete'])->name('category.delete');

//Routes for admin portfolio


Route::get('/admin/portfolio',[BackendCategoryController::class,'index'])->name('portfolio.index');
Route::get('/admin/portfolio/create',[BackendCategoryController::class,'create'])->name('portfolio.create');
Route::post('/admin/portfolio/store',[BackendCategoryController::class,'store'])->name('portfolio.store');
Route::get('/admin/portfolio/show{portfolio}',[BackendCategoryController::class,'show'])->name('portfolio.show');
Route::get('/admin/portfolio/edit{portfolio}',[BackendCategoryController::class,'edit'])->name('portfolio.edit');
Route::patch('/admin/portfolio/update/{portfolio}',[BackendCategoryController::class,'update'])->name('portfolio.update');
Route::delete('/admin/portfolio/delete{portfolio}',[BackendCategoryController::class,'delete'])->name('portfolio.delete');