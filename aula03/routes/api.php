<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\UserController;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('produtos',ProdutoController::class)
        ->middleware('auth:sanctum');//todas protegidas (post, put, delete)

Route::apiResource('produtos',ProdutoController::class)
        ->only(['index','show']);//sobreescreve a proteção de index e show

Route::apiResource('users',UserController::class)->only(['store']);//Desprotegidas
Route::apiResource('users',UserController::class)
    ->middleware('auth:sanctum')
    ->except(['store']);//cadastro

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth:sanctum');


require __DIR__.'/queries.php';
