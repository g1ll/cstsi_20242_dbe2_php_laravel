<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/',function () {
    return view('welcome');
});

Route::get('/ola',function () {
    echo "Olá Mundo !!!";
});


Route::get('/home',[HomeController::class,'index']);

Route::get('/produtos',[ProdutoController::class,'index']);

Route::get('/produtos/{id}',[ProdutoController::class,'show']);

Route::get('/produto',[ProdutoController::class,'create'])->name('produto.create');

Route::post('/produto',[ProdutoController::class,'store']);

Route::get('/produto/{id}',[
    ProdutoController::class,
    'edit']
)->name('produto.edit');

Route::post('/produto/{id}/update',[
    ProdutoController::class,
    'update']
)->name('produto.update');


Route::get('/produto/{id}/delete',[
    ProdutoController::class,
    'destroy']
)->name('produto.delete');

