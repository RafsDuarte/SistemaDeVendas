@extends('layouts.app')

@section('content')
    @if ($clientes->count() == 0)
        <a href="{{route('admin.vendas.create_cliente')}}" class="btn btn-lg btn-success" style="margin-bottom: 40px; margin-top: 40px;">Salvar Cliente</a>
    @else
        <a href="{{route('admin.vendas.create_cliente')}}" class="btn btn-lg btn-success" style="margin-bottom: 40px; margin-top: 40px;">Salvar Cliente</a>
        <table class="table table-striped">
                <head>
                    <tr>
                        <th>#</th>
                        <th>Nome do Cliente</th>
                        <th>Email</th>
                        <th>Celular/Whatsapp</th>
                        <th>Ações</th>
                    </tr>
                </head>
                <body>
                    @foreach($clientes as $cliente)
                    <tr>
                        <td>{{$cliente->id}}</td>
                        <td>{{$cliente->nome}}</td>
                        <td>{{$cliente->email}}</td>
                        <td>{{$cliente->celular_whatsapp}}</td>
                        <td> 
                            <div class="btn-group">
                                <a href="{{route('admin.vendas.edit_cliente', ['cliente' => $cliente->id])}}" class="btn btn-sm btn-primary">Editar</a>
                                <form action="{{route('admin.vendas.destroy_cliente', ['cliente' => $cliente->id])}}">

                                <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </body>
        </table>
        {{$clientes->links()}}
    @endif   
@endsection