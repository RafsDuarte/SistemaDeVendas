<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sapato;
use Illuminate\Http\Request;

class SapatoController extends Controller
{
    private $sapato;

    public function __construct(Sapato $sapato)
    {
        $this->sapato = $sapato;
    }


    public function index()
    {
        $sapatos = $this->sapato::paginate(10);
        
        return view('admin.sapatos.index', compact('sapatos'));
    }

    public function escolherCliente($sapato)
    {
        $sapato = $this->sapato::find($sapato);
        $clientes = \App\Models\Cliente::all(['id', 'nome']);


        return view('admin.sapatos.escolherCliente', compact('sapato', 'clientes'));

    }

    public function carrinho(Request $request, $sapato)
    {
        $sapato = \App\Models\Sapato::find($sapato);
        $cliente = $request->cliente;
        $resultado = \App\Models\Cliente::find($cliente);
        return view('admin.sapatos.carrinho', compact('resultado', 'sapato'));
    }

    public function final(Request $request, $sapato, $cliente)
    {
        $sapato = \App\Models\Sapato::find($sapato);
        $cliente = \App\Models\Cliente::find($cliente);
        $sapatoqtd = $request->sapatoqtd;

        $venda = \App\Models\Venda::create([
                'user_id' => '1',
                'cliente_id' => $cliente->id,
                'sapato_id' => $sapato->id,
                'sapatoqtd' => $sapatoqtd,
                'valortotal' => $sapatoqtd * $sapato->preco
                
        ]);


        flash('Venda Concluída com Sucesso!')->success();
        return redirect()->route('admin.vendas.index');
    }
}
