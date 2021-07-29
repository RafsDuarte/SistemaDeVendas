@extends('layouts.app')

@section('content')
    <h1>Criar Cliente</h1>
    <form action="{{route('admin.vendas.cliente')}}" method="post">
        @csrf

        <div class="form-group">
            <label>Nome do Cliente</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+.com" required>
        </div>

        <div class="form-group">
            <label>Celular/Whatsapp</label>
            <input type="text" name="celular_whatsapp" class="form-control" required>
        </div>

        <div>
            <button type="submit" class="btn btn-lg btn btn-success" style="margin-bottom: 40px; margin-top: 40px;">Salvar Cliente</button>
        </div>
    </form>
@endsection