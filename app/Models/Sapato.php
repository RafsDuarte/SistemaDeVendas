<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sapato extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'modelo',
        'numeracao',
        'cor',
        'descricao',
        'conteudo',
        'preço'
    ];

    public function venda()
    {
        return $this->hasOne(Venda::class);
    }
}
