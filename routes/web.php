<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\LetterTypeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportExportController;
use App\Http\Controllers\LetterController;

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



Route::middleware('IsLogin')->group(function(){
    
   
    Route::get('/home', function () {
        return view('home');
    })->name('home.page');

Route::prefix('/userg')->name('userg.')->group(function(){
    route::get('/', [GuruController::class, 'index'])->name('home');
    route::get('/create', [GuruController::class, 'create'])->name('create');
    route::get('/validate', [GuruController::class, 'validate'])->name('validate');
    route::post('/store', [GuruController::class, 'store'])->name('store');
    route::get('/{id}', [GuruController::class, 'edit'])->name('edit');
    route::patch('/{id}', [GuruController::class, 'update'])->name('update');
    route::delete('/{id}', [GuruController::class, 'destroy'])->name('delete');
    

    });

Route::prefix('/user')->name('user.')->group(function(){
    route::get('/', [UserController::class, 'index'])->name('home');
    route::get('/create', [UserController::class, 'create'])->name('create');
    route::get('/validate', [UserController::class, 'validate'])->name('validate');
    route::post('/store', [UserController::class, 'store'])->name('store');
    route::get('/{id}', [UserController::class, 'edit'])->name('edit');
    route::patch('/{id}', [UserController::class, 'update'])->name('update');
    route::delete('/{id}', [UserController::class, 'destroy'])->name('delete');
    

    });

    Route::prefix('/tipe')->name('tipe.')->group(function(){
        route::get('/', [LetterTypeController::class, 'index'])->name('surat');
        route::get('/create', [LetterTypeController::class, 'create'])->name('create');
        route::get('/validate', [LetterTypeController::class, 'validate'])->name('validate');
        route::post('/store', [LetterTypeController::class, 'store'])->name('store');
        route::get('/{id}', [LetterTypeController::class, 'edit'])->name('edit');
        route::patch('/{id}', [LetterTypeController::class, 'update'])->name('update');
        route::delete('/{id}', [LetterTypeController::class, 'destroy'])->name('delete');
        route::get('/data/export',[LetterTypeController::class, 'exportExcel'])->name('export-excel');
        
        
    });

    



    Route::prefix('/letter')->name('letter.')->group(function(){
        route::get('/', [LetterController::class, 'index'])->name('home');
        route::get('/create', [LetterController::class, 'create'])->name('create');
        route::get('/validate', [LetterController::class, 'validate'])->name('validate');
        route::post('/store', [LetterController::class, 'store'])->name('store');
        route::get('/{id}', [LetterController::class, 'edit'])->name('edit');
        route::patch('/{id}', [LetterController::class, 'update'])->name('update');
        route::delete('/{id}', [LetterController::class, 'destroy'])->name('delete');
        
        
        
    });

   
    });
Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/login', [UserController::class, 'loginAuth'])->name('login.auth');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');



