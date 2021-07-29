@extends('layouts.app')

@section('content')
    <h1>Criar Número</h1>
    <form action="{{route('admin.vendas.numero')}}" method="post">
        @csrf

        <div class="form-group">
            <label>Número do Sapato</label>
            <input type="text" name="numero" class="form-control" required>
        </div>

        <div>
            <button type="submit" class="btn btn-lg btn btn-success" style="margin-bottom: 40px; margin-top: 40px;">Salvar Número</button>
        </div>
    </form>
@endsection