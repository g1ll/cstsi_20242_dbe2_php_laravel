<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @if($produto)
    <h1>Update Produto</h1>
    <form action="{{route('produtos.update',$produto->id)}}" method="POST">
        {{-- @csrf --}}
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        {{-- <input type="hidden" name="_method" value="put"/> --}}
        @method('put')
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" value="{{$produto->nome}}"/></td>
            </tr>
            <tr>
                <td>Descricao:</td>
                <td><textarea name="descricao" id="" cols="30" rows="10">{{$produto->descricao}}</textarea></td>
            </tr>
            <tr>
                <td>Quantidade em Estoque:</td>
                <td><input type="text" name="qtd_estoque" value="{{$produto->qtd_estoque}}"/></td>
            </tr>
            <tr>
                <td>Preço:</td>
                <td><input type="number" name="preco" step=".01" value="{{$produto->preco}}"/></td>
            </tr>
            <tr>
                <td>Importado:</td>
                <td><input type="checkbox" name="importado" {{($produto->importado)?'checked':''}}/></td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <input type="submit" value="Salvar"/>
                    <a href="/produtos"><button form=cancel >Cancelar</button></a>
                </td>
            </tr>
        </table>
    </form>
    @else
    <p>Produto não encontrado!!!</p>
    @endif
</body>
</html>