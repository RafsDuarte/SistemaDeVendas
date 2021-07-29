<?php

namespace App\Http\Controllers\Admin;

use App\Models\RegistrosVenda;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistrosVendaController extends Controller
{
    public function __construct(RegistrosVenda $venda)
    {
        $this->venda = $venda;
        
    }

    public function index()
    {
        $vendas = $this->venda->paginate(10);

        return view('admin.registrosVendas.index', compact('vendas'));
    }
}
