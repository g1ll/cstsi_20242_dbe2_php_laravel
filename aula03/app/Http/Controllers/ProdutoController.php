<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    function index() {
        $listProdutos = Produto::all();
        // return response()->json(['data'=>$listProdutos]); //json
        return view('produto.index',['data'=>$listProdutos]);
    }

    function show($id){
        return view('produto.show',['produto'=>Produto::find($id)]);
    }
}
