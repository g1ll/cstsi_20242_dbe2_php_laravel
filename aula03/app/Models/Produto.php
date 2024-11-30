<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{

    use HasFactory;

    // protected $table = "product";
    // protected $primaryKey = "cpf";
    protected $fillable = [
        'nome',
        'descricao',
        'qtd_estoque',
        'preco',
        'importado',
        'fornecedor_id'
    ];

    protected $casts = [
        'importado' => 'boolean'
    ];

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }

}
