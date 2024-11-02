<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ProdutoController extends Controller
{
    public function index() {
        $listProdutos = Produto::all();
        // dd($listProdutos);
        // return response()->json(['data'=>$listProdutos]); //json
        // return view('produto.index',['data'=>$listProdutos]); //helper
        return View::make('produto.index',['data'=>$listProdutos]);//facade
    }

    function show($id){
        // dd(Produto::find($id));
        return view('produto.show',['produto'=>Produto::find($id)]);
    }

    public function create(){
        return view('produto.create');
    }

    public function store(Request $req){
        // dd($req->all());
        $produto = $req->all();
        $produto['importado']=$req->has('importado');
        // dd($produto);

        if(Produto::create($produto)){
            return redirect('/produtos');
        }else {
            dd("Erro ao inserir Produto!!");
        }
    }

    public function edit($id){
        return view('produto.edit',[
            'produto'=>Produto::find($id)
        ]);
    }

    public function update(Request $request,$id){
        // dd([
        //     $request->all(),
        //     $id
        // ]);
        $produto = $request->all();
        $produto['importado']=$request->has('importado');

        try{
            Produto::findOrFail($id)->update($produto);
            return redirect('/produtos');
        }catch(Exception $error){
            dd($error);
        }
    }

    public function destroy($id){
        try{
            Produto::destroy($id);
            return redirect('/produtos');
        }catch(Exception $error){
            dd($error);
        }
    }


}
