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


Route::controller(ProdutoController::class)->group(function(){
    Route::prefix('/produtos')->group(function () {
        Route::get('/','index')->name("produto.index");
        Route::get('/{id}','show')->name("produto.show");
    });

    Route::prefix('/produto')->group(function () {
        Route::get('/','create')->name("produto.create");
        Route::post('/','store')->name("produto.store");
        Route::get('/{id}/edit','edit')->name("produto.edit");
        Route::post('/{id}/update','update')->name("produto.update");
        Route::get('/{id}/delete',[
            ProdutoController::class,
            'destroy']
        )->name('produto.delete');
    });
});


