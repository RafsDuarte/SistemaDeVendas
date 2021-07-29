@extends('layouts.app')

@section('content')
    @if ($colors->count() == 0)
        <a href="{{route('admin.vendas.create_cor')}}" class="btn btn-lg btn-success" style="margin-bottom: 40px; margin-top: 40px;">Salvar Cor</a>
    @else
        <a href="{{route('admin.vendas.create_cor')}}" class="btn btn-lg btn-success" style="margin-bottom: 40px; margin-top: 40px;">Salvar Cor</a>
        <table class="table table-striped">
                <head>
                    <tr>
                        <th>#</th>
                        <th>Nome da Cor</th>
                        <th>Ações</th>
                    </tr>
                </head>
                <body>
                    @foreach($colors as $color)
                    <tr>
                        <td>{{$color->id}}</td>
                        <td>{{$color->nome}}</td>
                        <td> 
                            <div class="btn-group">
                                <a href="{{route('admin.vendas.edit_cor', ['color' => $color->id])}}" class="btn btn-sm btn-primary">Editar</a>
                                <form action="{{route('admin.vendas.destroy_cor', ['color' => $color->id])}}">

                                <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </body>
        </table>
        {{$colors->links()}}
    @endif   
@endsection