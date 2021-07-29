@extends('layouts.app')

@section('content')
    @if ($numbers->count() == 0)
        <a href="{{route('admin.vendas.create_numero')}}" class="btn btn-lg btn-success" style="margin-bottom: 40px; margin-top: 40px;">Salvar Número</a>
    @else
        <a href="{{route('admin.vendas.create_numero')}}" class="btn btn-lg btn-success" style="margin-bottom: 40px; margin-top: 40px;">Salvar Número</a>
        <table class="table table-striped">
                <head>
                    <tr>
                        <th>#</th>
                        <th>Número do Sapato</th>
                        <th>Ações</th>
                    </tr>
                </head>
                <body>
                    @foreach($numbers as $number)
                    <tr>
                        <td>{{$number->id}}</td>
                        <td>{{$number->numero}}</td>
                        <td> 
                            <div class="btn-group">
                                <a href="{{route('admin.vendas.edit_numero', ['number' => $number->id])}}" class="btn btn-sm btn-primary">Editar</a>
                                <form action="{{route('admin.vendas.destroy_numero', ['number' => $number->id])}}">

                                <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </body>
        </table>
        {{$numbers->links()}}
    @endif   
@endsection