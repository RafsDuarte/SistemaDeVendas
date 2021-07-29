<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function __construct(Color $color)
    {   
        $this->color = $color;    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registros()
    {
        $colors = $this->color->paginate(10);

        return view('admin.colors.registros', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.colors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cor(Request $request)
    {
        $data = $request->all();
        $color = $this->color::create($data);
        
        flash('Cor Criada com Sucesso!')->success();
        return redirect()->route('admin.vendas.registros_cores');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show($color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit($color)
    {
        $color = $this->color->find($color);

        return view('admin.colors.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $color)
    {
        $data = $request->all();

        $color = $this->color->find($color);
        $color->update($data);
     
       if($color->getChanges())
        {
            flash('Cor Atualizada com Sucesso!')->success();
            return redirect()->route('admin.vendas.registros_cores');
        }
        else
        {
             return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy($color)
    {
        $color = $this->color->find($color);
        $color->delete();

        flash('Cor Removida com Sucesso!')->success();
        return redirect()->route('admin.vendas.registros_cores');
        
    }
}
