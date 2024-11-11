<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProdutoCollection;
use App\Http\Resources\ProdutoResource;
use App\Models\Produto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ProdutoCollection(Produto::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                "nome" => "required | max: 10",
                "importado" => "nullable | boolean",
                "qtd_estoque" => "required | numeric | min:2",
                "descricao" => "required | max:500",
                "preco" => "required | numeric | min: 1.99",
            ]);
            $produto = $request->all();
            $produto['importado'] = $request->has('importado');
            $novoProduto  = Produto::create($produto);
            return response()->json([
                "data" => $novoProduto,
                "message" => "Produto criado com sucesso!!!",
            ], 201);
        } catch (ValidationException $error) {
            throw $error;
        } catch (Exception $error) {
            $httpStatus = 500;
            return response()->json("Erro ao cadastrar produto!!!",$httpStatus);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return new ProdutoResource($produto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        //
    }
}
