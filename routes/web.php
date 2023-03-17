<?php

use App\Http\Controllers\backend\CategoryController as BackendCategoryController;
use App\Http\Controllers\backend\HomeController;
use App\Http\Controllers\backend\PortfolioController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\frontend\FrontendController;
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

//frontend
Route::get('/frontend',[FrontendController::class,'index'])->name('frontend.index');


//admin
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


Route::get('/admin/portfolio',[PortfolioController::class,'index'])->name('portfolio.index');
Route::get('/admin/portfolio/create',[PortfolioController::class,'create'])->name('portfolio.create');
Route::post('/admin/portfolio/store',[PortfolioController::class,'store'])->name('portfolio.store');
Route::get('/admin/portfolio/show{portfolio}',[PortfolioController::class,'show'])->name('portfolio.show');
Route::get('/admin/portfolio/edit{portfolio}',[PortfolioController::class,'edit'])->name('portfolio.edit');
Route::patch('/admin/portfolio/update/{portfolio}',[PortfolioController::class,'update'])->name('portfolio.update');
Route::delete('/admin/portfolio/delete{portfolio}',[PortfolioController::class,'delete'])->name('portfolio.delete');

Route::get('/admin/portfolio/trash',[PortfolioController::class,'trash'])->name('portfolio.trash');
Route::get('/admin/portfolio/trash/restore{portfolio}',[PortfolioController::class,'restore'])->name('portfolio.restore');
Route::delete('/admin/portfolio/trash/permanentdelete{portfolio}',[PortfolioController::class,'permanentdelete'])->name('portfolio.permanentdelete');

