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

    function show(Produto $produto){
        // dd(Produto::find($id));
        // dd($produto);

        return view('produto.show',[
            // 'produto'=>Produto::find($id)
            'produto'=>$produto
        ]);
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

    public function edit(Produto $produto){
        return view('produto.edit',[
            'produto'=>$produto
        ]);
    }

    public function update(Request $request,Produto $produto){
        // dd([
        //     $request->all(),
        //     $id
        // ]);
        $updatedProduto = $request->all();
        $updatedProduto['importado']=$request->has('importado');

        try{
            $produto->update($updatedProduto);
            return redirect('/produtos');
        }catch(Exception $error){
            dd($error);
        }
    }

    public function remove($id){
        // return view("produto.remove",["produto"=>Produto::find($id)]);
        try{
            return view("produto.remove",[
                "produto"=>Produto::findOrFail($id)
            ]);
        }catch(Exception $error){
            dd($error);
        }
    }

    public function destroy(Produto $produto){
        // dd($produto->id);
        try{
            Produto::destroy($produto->id);
            return redirect('/produtos');
        }catch(Exception $error){
            dd($error);
        }
    }


}
