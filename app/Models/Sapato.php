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
        'number_id',
        'color_id',
        'descricao',
        'preco'
    ];

    public function registrosVenda()
    {
        return $this->hasOne(RegistrosVenda::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function number()
    {
        return $this->belongsTo(Number::class);
    }
}
