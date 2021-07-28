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
    
    public function venda()
    {
        return $this->hasOne(Venda::class);
    }

}
