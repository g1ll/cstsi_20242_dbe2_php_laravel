<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Http\Requests\ProdutoStoreRequest;
use App\Http\Requests\ProdutoUpdateRequest;
use App\Http\Resources\ProdutoCollection;
use App\Http\Resources\ProdutoResource;
use App\Http\Resources\ProdutoStoredResource;
use App\Models\Produto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
    public function store(ProdutoStoreRequest $request)
    {
        try {
            $newProduto = $request->validated();
            if ($request->file('imagem')) {
                $fileName = $request->file('imagem')->hashName();
                if (!$request->file('imagem')->store('produtos', 'public'))
                    throw new Exception("Erro ao salvar imagem do produto!!");

                $newProduto['imagem'] = $fileName;
            }
            return new ProdutoStoredResource(Produto::create($newProduto));
        } catch (Exception $error) {
            $this->errorHandler("Erro ao criar Produto!!",$error);
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
    public function update(ProdutoUpdateRequest $request, Produto $produto)//FormRequest
    {
        try {
            $newProduto = $request->validated();
            if ($request->file('imagem')) {
                $fileName = $request->file('imagem')->hashName();

                if (!$request->file('imagem')->store('produtos', 'public'))
                    throw new Exception("Erro ao salvar imagem do produto!!");

                if ($produto->imagem) {
                    $path = 'produtos/';
                    if(Storage::disk('public')->exists($path.$produto->imagem))
                        Storage::disk('public')->delete($path.$produto->imagem);
                }

                $newProduto['imagem'] = $fileName;
            }
            $produto->update($newProduto);
            return (new ProdutoResource($produto))
                ->additional(['message' => 'Produto atualizado com sucesso!!']);
        } catch (Exception $error) {
            return $this->errorHandler("Erro ao atualizar produto!!", $error);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        try {
            $produto->delete();
            if ($produto->imagem) {
                $path = 'produtos/';
                if(Storage::disk('public')->exists($path.$produto->imagem))
                    Storage::disk('public')->delete($path.$produto->imagem);
            }
            return (new ProdutoResource($produto))
                ->additional(["message" => "Produto removido!!!"]);
        } catch (Exception $error) {
            return $this->errorHandler("Erro ao remover produto!!", $error);
        }
    }
}
