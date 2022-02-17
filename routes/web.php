<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ResponseController;

Route::middleware('auth')->group(function(){
    Route::get('admin', [BackendController::class, 'index'])->name('index');
    Route::get('news/create', [NewsController::class, 'create'])->name('news.create');
    Route::get('news/detail/{id}', [NewsController::class, 'detail'])->name('news.detail');
    Route::post('news/store', [NewsController::class, 'store'])->name('news.store');
    Route::get('news/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('news/update', [NewsController::class, 'update'])->name('news.update');
    Route::delete('news/delete', [NewsController::class, 'delete'])->name('news.delete');
    Route::get('admin', [BackendController::class, 'index'])->name('index');
    Route::delete('response/delete', [ResponseController::class, 'delete'])->name('response.delete');
});

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('news/read/{id}', [NewsController::class, 'read'])->name('news.read');
Route::post('response/store', [ResponseController::class, 'store'])->name('response.store');

Auth::routes();

