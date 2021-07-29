@extends('layouts.app')

@section('content')
    <h1>Criar Cor</h1>
    <form action="{{route('admin.vendas.cor')}}" method="post">
        @csrf

        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div>
            <button type="submit" class="btn btn-lg btn btn-success" style="margin-bottom: 40px; margin-top: 40px;">Salvar Cor</button>
        </div>
    </form>
@endsection