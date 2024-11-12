<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdutoStoreRequest;
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
    public function store(ProdutoStoreRequest $request)
    {
        try {
            $novoProduto  = Produto::create($request->validated());
            return (new ProdutoResource($novoProduto))
                        ->additional(["message" => "Produto criado com sucesso!!",]) //Novo atributo no json retornado
                        ->response() //Objeto JsonResponse do Synfoni
                        ->setStatusCode(201, 'Produto Criado!!!');//método do objeto JsonResponse
        } catch (ValidationException $error) {
            throw $error;
        } catch (Exception $error) {
            $httpStatus = 500;
            $message = "Erro ao cadastrar produto!!!";
            $response = ["Erro" => $message];
            if (env('APP_DEBUG'))
                $response = [
                    ...$response,
                    'message' => $error->getMessage(),
                    'exception' => $error,
                    'trace' => $error->getTrace()
                ];
            return response()->json($response, $httpStatus);
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
