<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ProdutoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        // return parent::toArray($request);
        return [
            ...parent::toArray($request),
            'fornecedor' => FornecedorResource::make($this->whenLoaded('fornecedor')),
            'imagem'=>$this->when($this->imagem, Storage::url('produtos/' . $this->imagem))
        ];
    }
}
