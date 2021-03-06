<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'celular_whatsapp',
    ];
    
    public function registrosVenda()
    {
        return $this->hasOne(RegistrosVenda::class);
    }

}
