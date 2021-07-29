@extends('layouts.app')

@section('content')
    <h1>Criar Sapato</h1>
    <form action="{{route('admin.vendas.sapato')}}" method="post">
        @csrf

        <div class="form-group">
            <label>Nome do Sapato</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Modelo do Sapato</label>
            <input type="text" name="modelo" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="descricao" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Numeração</label>
            <select name="number_id" class="form-control">
                @foreach($numbers as $number)
                <option value="{{$number->id}}">{{$number->numero}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Cor</label>
            <select name="color_id" class="form-control">
                @foreach($colors as $color)
                <option value="{{$color->id}}">{{$color->nome}}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label>Preço</label>
            <input type="text" name="preco" class="form-control" required>
        </div>

        <div>
            <button type="submit" class="btn btn-lg btn btn-success" style="margin-bottom: 40px; margin-top: 40px;">Salvar Cliente</button>
        </div>
    </form>
@endsection