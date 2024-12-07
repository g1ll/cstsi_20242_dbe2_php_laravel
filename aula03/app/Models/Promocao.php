<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promocao extends Model
{
    protected $table = 'promocoes';
    protected $fillable = ['inicio','fim','nome'];

    public function produtos()
    {
        return $this->belongsToMany(Produto::class)
            ->withPivot('desconto')
            ->withTimestamps();
    }
}
