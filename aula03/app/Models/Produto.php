<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    // protected $table = "product";
    // protected $primaryKey = "cpf";
    protected $fillable = [
        'nome',
        'descricao',
        'qtd_estoque',
        'preco',
        'importado'
    ];
}
