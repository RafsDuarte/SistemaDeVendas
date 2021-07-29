<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct(Cliente $cliente)
    {   
        $this->cliente = $cliente;    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registros()
    {
        $clientes = $this->cliente->paginate(10);

        return view('admin.clientes.registros', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cliente(Request $request)
    {
        $data = $request->all();
        $cliente = $this->cliente::create($data);
        
        flash('Cliente Criado com Sucesso!')->success();
        return redirect()->route('admin.vendas.registros_clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($cliente)
    {
        $cliente = $this->cliente->find($cliente);

        return view('admin.clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cliente)
    {
        $data = $request->all();

        $cliente = $this->cliente->find($cliente);
        $cliente->update($data);
     
       if($cliente->getChanges())
        {
            flash('Cliente Atualizado com Sucesso!')->success();
            return redirect()->route('admin.vendas.registros_clientes');
        }
        else
        {
             return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($cliente)
    {
        $cliente = $this->cliente->find($cliente);
        $cliente->delete();

        flash('Cliente Removido com Sucesso!')->success();
        return redirect()->route('admin.vendas.registros_clientes');
        
    }
}
