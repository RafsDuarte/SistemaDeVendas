@extends('layouts.app')

@section('content')
    @if ($sapatos->count() == 0)
        <a href="{{route('admin.vendas.create_sapato')}}" class="btn btn-lg btn-success" style="margin-bottom: 40px; margin-top: 40px;">Salvar Sapato</a>
    @else
        <a href="{{route('admin.vendas.create_sapato')}}" class="btn btn-lg btn-success" style="margin-bottom: 40px; margin-top: 40px;">Salvar Sapato</a>
        <table class="table table-striped">
                <head>
                    <tr>
                        <th>#</th>
                        <th>Nome do Sapato</th>
                        <th>Modelo do Sapato</th>
                        <th>Descrição</th>
                        <th>Numeração</th>
                        <th>Cor</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </head>
                <body>
                    @foreach($sapatos as $sapato)
                    <tr>
                        <td>{{$sapato->id}}</td>
                        <td>{{$sapato->nome}}</td>
                        <td>{{$sapato->modelo}}</td>
                        <td>{{$sapato->descricao}}</td>
                        <td>{{$sapato->number->numero}}</td>
                        <td>{{$sapato->color->nome}}</td>
                        <td>R$ {{number_format($sapato->preco, 2, ',', '.')}}</td>
                        <td> 
                            <div class="btn-group">
                                <a href="{{route('admin.vendas.edit_sapato', ['sapato' => $sapato->id])}}" class="btn btn-sm btn-primary">Editar</a>
                                <form action="{{route('admin.vendas.destroy_sapato', ['sapato' => $sapato->id])}}">

                                <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </body>
        </table>
        {{$sapatos->links()}}
    @endif   
@endsection