@extends('layouts.app')

@section('content')
<h1>Editar Cor</h1>
    <form action="{{route('admin.vendas.update_cor', ['color' => $color->id])}}" method="POST">
        @csrf    
        <div class="form-group">
            <label>Nome da Cor</label>
            <input type="text" name="nome" class="form-control" value="{{$color->nome}}" required>
        </div>

        <div>
            <button type="submit" class="btn btn-lg btn btn-success" style="margin-bottom: 40px; margin-top: 40px;" >Atualizar Cor</button>
        </div>
    </form>
@endsection