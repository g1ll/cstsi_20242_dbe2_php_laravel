<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
</head>
<body>
    <h1>Produtos</h1>
    <a href="{{route("produtos.create")}}">+Criar Novo Produto</a>
    @if ($data->count()>0)
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>qtd_estoque</th>
                <th>preco</th>
                <th>Importado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $produto)
            <tr>
                <td>
                    <a href="/produtos/{{$produto->id}}">{{$produto->id}}</a>
                </td>
                <td>{{$produto->nome}}</td>
                <td>{{$produto->qtd_estoque}}</td>
                <td>{{$produto->preco}}</td>
                <td>{{($produto->importado)?'Sim':'Não'}}</td>
                <td>
                    <a href="{{route("produtos.edit",$produto->id)}}">editar</a>
                </td>
                <td>
                    <a href="{{route("produto.delete",$produto->id)}}">deletar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Produtos não encontrados! </p>
    @endif
</body>
</html>
