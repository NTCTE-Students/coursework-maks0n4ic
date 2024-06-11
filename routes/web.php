<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActionsController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LotController;


Route::get('/', [LotController::class,'randomPosts'])->name('');
Route::get('/createposts', function () {
    return view('createposts');
})->middleware('auth');

Route::get('/register', function () {
    return view('register');
})->middleware('guest');

Route::post('/register', [ActionsController::class, 'register'])->name('register');

Route::get('/logout', [ActionsController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/login', function(){
    return view('login');
})->middleware('guest');

Route::post('/login', [ActionsController::class, 'login'])
->name('login');

Route::post('/createposts', [ImageController::class, 'uploadImage'])->name('myposts');

Route::get('/lots/{param?}', [ImageController::class, 'show'])->name('image.show');

Route::get('/lot/{id}', [ImageController::class, 'show_lot']);

Route::post('/lot/update/{id}', [ImageController::class, 'update_lot']);

Route::post('/lot/buy/{id}', [ImageController::class, 'buy_lot']);
