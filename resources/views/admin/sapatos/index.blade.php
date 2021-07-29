@extends('layouts.app')

@section('content')
    <!-- Section-->
    <section class="py-5">
        @if ($sapatos->count() == 0)
            <h1 class="text-center" style="margin-bottom: 40px; margin-right: 40px;">SEM ESTOQUE! FAVOR CRIAR UM SAPATO!</h1>
        @else
                @foreach($sapatos as $sapato)
                    <div class="container px-4 px-lg-5 mt-5">
                        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                            <div class="col mb-5">
                                <div class="card h-100">
                                    <!-- Product image-->
                                    <img class="card-img-top" src="\images\sapato4.jpg" alt="..." />
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder">{{$sapato->nome}}</h5>
                                            <h4 class="fw-normal">{{$sapato->descricao}}</h4>
                                            <h3 class="fw-light">{{$sapato->cor}}</h3>
                                            <!-- Product price-->
                                            R$ {{number_format($sapato->preco, 2, ',', '.')}}
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center">
                                            <a href="{{route('admin.vendas.escolher_cliente', ['sapato' => $sapato->id])}}" class="btn btn-outline-dark mt-auto" >Escolher Cliente</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{$sapatos->links()}}
                @endforeach      
        @endif  
    </section>   
@endsection