<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{

    use HasFactory;

    protected $fillable = [
        "nome",
        "cnpj",
        "email",
        "estado_id",
        "telefone",
        "endereco"
    ];

    protected $table='fornecedores';

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}
