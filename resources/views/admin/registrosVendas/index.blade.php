@extends('layouts.app')

@section('content')
    <div class="container px-4 px-lg-5 mt-5">
        <h1>Registros das Vendas</h1>
    </div>
<br>
    <table class="table table-striped">
        <head>
            <tr>
                <th>#</th>
                <th>Vendedor</th>
                <th>Cliente</th>
                <th>Sapato</th>
                <th>Quantidade</th>
                <th>Valor Total</th>
            </tr>
        </head>
        <body>
            @foreach($vendas as $venda)
            <tr>
                <td>{{$venda->id}}</td>
                <td>{{$venda->user->name}}</td>
                <td>{{$venda->cliente->nome}}</td>
                <td>{{$venda->sapato->nome}}</td>
                <td>{{number_format($venda->sapatoqtd, 0)}}x</td>
                <td>R$ {{number_format($venda->valortotal, 2, ',', '.')}}</td>
            </tr>
            @endforeach
        </body>
    </table>

    {{$vendas->links()}}
@endsection