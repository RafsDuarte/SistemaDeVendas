@extends('layouts.app')

@section('content')

    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link href="\css\cart.css" rel="stylesheet" />
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

<form action="{{route('admin.vendas.final', ['sapato' => $sapato->id, 'cliente' => $resultado->id])}}">
    @csrf
    @method("POST")
    <div class="container mt-5 mb-8">
            <div class="d-flex justify-content-center row">
                <div class="col-md-8">
                    <div class="p-2">
                        <h2>Carrinho</h2>
                    </div>
                    <div>
                        <h4>Cliente</h4>
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
                        <div class="mr-1"><img class="rounded" src="\images\perfil-sem-foto.jpg" width="70"></div>
                        <div class="d-flex flex-column align-items-center product-details">
                            <span class="font-weight-bold">{{$resultado->nome}}</span>
                            <span class="font-weight-bold">{{$resultado->email}}</span>
                        </div>
                        <div class="d-flex align-items-center"></div>
                    </div>
                    <div>
                        <h4>Sapato</h4>
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
                        <div class="mr-1"><img class="rounded" src="\images\sapato4.jpg" width="70"></div>
                        <div class="d-flex flex-column align-items-center product-details"><span class="font-weight-bold">{{$sapato->nome}}</span>
                            <div class="d-flex flex-row product-desc">
                                <div class="size mr-1"><span class="text-grey">Numeracao:</span><span class="font-weight-bold">&nbsp;{{$sapato->numeracao}}</span></div> 
                                &nbsp;
                                <div class="color"><span class="text-grey">Cor:</span><span class="font-weight-bold">&nbsp;{{$sapato->cor}}</span></div>
                            </div>
                        </div>
                        <div class="text text-center">
                            <?php
                                $sapatoqtd = null;
                            
                            ?>
                            <label for="sapatoqtd">Quantidade:</label> &nbsp;
                            <input type="text" value="1" name="sapatoqtd" class="font-weight-bold text text-center col-md-offset-5 col-md-5"></h5>
                        </div>
                        <div>
                            <h5 class="text-grey">R$ {{number_format($sapato->preco, 2, ',', '.')}}</h5>
                        </div>
                        <div class="d-flex align-items-center"></div>
                    </div>
                    <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded">
                        <button type="submit" class="btn btn-warning btn-block btn-lg ml-2 pay-button">
                            Prosseguir para o pagamento
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection