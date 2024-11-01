<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produto</title>
</head>
<body>
    <h1>{{$produto->nome}}</h1>
    <p>{{$produto->descricao}}</p>
    <ul>
        <li><b>Preço:</b>{{$produto->preco}}</li>
        <li><b>Qtd:</b>{{$produto->qtd_estoque}}</li>
        <li><b>Origem:</b>{{$produto->importado?"Importado":"Nacional"}}</li>
    </ul>
    <a href="/produtos">voltar</a>
</body>
</html>
