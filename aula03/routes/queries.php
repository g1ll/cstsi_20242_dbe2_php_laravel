<?php





//Erro: o laravel tentava buscar o produto de id=reigao
//Route::get('/produtos/regiao)',function(){ //A rota errada

//Todos os produtos com fornecedores que estão em estados
//e que estão na região de nome  determinado por $nome
// Route::get('/produtos/query/regiao/{nome}',function($nome){
//     return Produto::whereHas('fornecedor',
//             fn($q)=>$q->whereHas('estado',
//                 fn($q)=>$q->whereHas('regiao',
//                     fn($q)=>$q->where('nome','like',$nome)
//                     )
//                 )
//             )->get()
//             ->load('fornecedor.estado.regiao');
// });

use App\Models\Produto;
use App\Models\Regiao;
use Illuminate\Support\Facades\Route;

Route::prefix('filters')->group(function(){

    Route::prefix('produtos')->group(function(){

        Route::get('/regiao/{nome}',function($nome){
            // return Regiao::where('nome',$nome)
                // ->get() //Coleção
                // ->first()
                // ->produtos;
                // Produto::whereHas('regiao',fn($q)=>$q->where('nome','like',$nome));
                return Produto::porRegiao($nome)->get();
        });

    });

});
