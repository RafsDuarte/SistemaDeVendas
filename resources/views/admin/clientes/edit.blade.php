@extends('layouts.app')

@section('content')
<h1>Editar Cliente</h1>
    <form action="{{route('admin.vendas.update_cliente', ['cliente' => $cliente->id])}}" method="POST">
        @csrf    

        <div class="form-group">
            <label>Nome do Cliente</label>
            <input type="text" name="nome" class="form-control" value="{{$cliente->nome}}" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{$cliente->email}}" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+.com" required>
        </div>

        <div class="form-group">
            <label>Celular/Whatsapp</label>
            <input type="text" name="celular_whatsapp" class="form-control" value="{{$cliente->celular_whatsapp}}" required>
        </div>

        <div>
            <button type="submit" class="btn btn-lg btn btn-success" style="margin-bottom: 40px; margin-top: 40px;" >Atualizar Cliente</button>
        </div>
    </form>
@endsection