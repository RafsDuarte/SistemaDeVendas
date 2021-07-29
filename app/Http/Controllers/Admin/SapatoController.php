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

    public function registros()
    {
        $sapatos = $this->sapato::paginate(10);
        
        return view('admin.sapatos.registros', compact('sapatos'));
    }


    public function create()
    {
        $colors = \App\Models\Color::all(['id', 'nome']);
        $numbers = \App\Models\Number::all(['id', 'numero']);

        return view('admin.sapatos.create', compact('colors', 'numbers'));
    }


    public function sapato(Request $request)
    {
        $data = $request->all();
        $sapato = $this->sapato::create($data);
        
        flash('Sapato Criado com Sucesso!')->success();
        return redirect()->route('admin.vendas.registros_sapatos');
    }

    public function edit($sapato)
    {
        $sapato = $this->store->find($sapato);

        return view ('admin.sapatos.edit', compact('sapato'));
    }

    public function update(Request $request, $sapato)
    {
        $data = $request->all();

        $sapato = $this->sapato->find($sapato);
        $sapato->update($data);
     
       if($sapato->getChanges())
        {
            flash('Sapato Atualizado com Sucesso!')->success();
            return redirect()->route('admin.vendas.registros_sapatos');
        }
        else
        {
             return back();
        }
    }

    public function destroy($sapato)
    {
        $sapato = \App\Models\Sapato::find($sapato);
        $sapato->delete();

        flash('Sapato Removido com Sucesso!')->success();
        return redirect()->route('admin.vendas.registros_sapatos');
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
        $user = auth()->user();
        $sapato = \App\Models\Sapato::find($sapato);
        $cliente = \App\Models\Cliente::find($cliente);
        $sapatoqtd = $request->sapatoqtd;

        $venda = \App\Models\RegistrosVenda::create([
                'user_id' => $user->id,
                'cliente_id' => $cliente->id,
                'sapato_id' => $sapato->id,
                'sapatoqtd' => $sapatoqtd,
                'valortotal' => $sapatoqtd * $sapato->preco
                
        ]); 
        flash('Venda Concluída com Sucesso!')->success();
        return redirect()->route('admin.vendas.index');
    }
}
