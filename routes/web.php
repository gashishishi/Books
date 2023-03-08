<?php

use App\Http\Controllers\LBController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\DropOffController;
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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// views.LB関係
Route::get('/',[LBController::class,'index']);
Route::get('/search',[LBController::class,'search']);

Auth::routes();

use App\Http\Controllers\MypageController;
use App\Http\Controllers\RentController;

Route::get('/mypage',[MypageController::class, 'index'])
->middleware('auth');
Route::get('/mypage/history',[MypageController::class, 'history'])
->middleware('auth');

Route::post('/rent', [RentController::class, 'rent']);
Route::post('/return',[RentController::class, 'return']);
Route::get('/test');