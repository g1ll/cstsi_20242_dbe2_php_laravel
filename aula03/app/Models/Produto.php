<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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
        "imagem",
        'fornecedor_id'
    ];

    protected $casts = [
        'importado' => 'boolean'
    ];

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }

    public function promocoes()
    {
        return $this->belongsToMany(Promocao::class)
            ->withPivot('desconto')
            ->withTimestamps();
    }


    //https://laravel.com/docs/11.x/eloquent#query-scopes
    public function scopeImportados(Builder $query)
    {
        return $query->where('importado', true);
    }

    //query scope Local
    public function scopePorRegiao(Builder $query, string $nome)
    {
        return $query->whereHas(
            'fornecedor',
            fn($q) => $q->whereHas(
                'estado',
                fn($q) => $q->whereHas(
                    'regiao',
                    fn($q) => $q->where('nome', 'like', $nome)
                )
            )
        );
    }


    //escopo global
    protected static function booted()
    {
        static::addGlobalScope('fornecedor', function (Builder $builder) {
            $builder->with('fornecedor');
        });
    }
}
