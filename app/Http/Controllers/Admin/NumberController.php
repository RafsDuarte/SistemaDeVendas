<?php

namespace App\Http\Controllers\Admin;

use App\Models\Number;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NumberController extends Controller
{
    public function __construct(Number $number)
    {   
        $this->number = $number;    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registros()
    {
        $numbers = $this->number->paginate(10);

        return view('admin.numbers.registros', compact('numbers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.numbers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function numero(Request $request)
    {
        $data = $request->all();
        $number = $this->number::create($data);
        
        flash('Número Criado com Sucesso!')->success();
        return redirect()->route('admin.vendas.registros_numeros');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function show(Number $number)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function edit($number)
    {
        $number = $this->number->find($number);

        return view('admin.numbers.edit', compact('number'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $number)
    {
        $data = $request->all();

        $number = $this->number->find($number);
        $number->update($data);
     
       if($number->getChanges())
        {
            flash('Número Atualizado com Sucesso!')->success();
            return redirect()->route('admin.vendas.registros_numeros');
        }
        else
        {
             return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function destroy($number)
    {
        $number = $this->number->find($number);
        $number->delete();

        flash('Número Removido com Sucesso!')->success();
        return redirect()->route('admin.vendas.registros_numeros');
    }
}
