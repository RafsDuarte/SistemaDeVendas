<?php

namespace App\Http\Controllers\Admin;

use App\Models\Venda;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendaController extends Controller
{

    public function __construct(Venda $venda)
    {
        $this->venda = $venda;
        
    }

    public function index()
    {
        $vendas = $this->venda->paginate(10);

        return view('admin.vendas.index', compact('vendas'));
    }
}
