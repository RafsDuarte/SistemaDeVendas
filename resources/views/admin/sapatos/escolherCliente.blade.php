@extends('layouts.app')

@section('content')

    <div class="container px-4 px-lg-5 mt-5">
        <h1>Escolha um Cliente</h1>
    </div>
    <form action="{{route('admin.vendas.carrinho', ['sapato' => $sapato->id])}}">
        @csrf
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <label for="clientes">Nome do Cliente</label> 
                    <div class="col mb-5">
                        <select name="cliente" class="form-control">
                            @foreach($clientes as $cli)
                                <option value="{{$cli->id}}">{{$cli->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                        <div>
                            <button type="submit" class="btn btn-outline-dark mt-auto">Ir para o carrinho</button>
                       </div>
           </div>
        </div>
    </form>
@endsection
 
