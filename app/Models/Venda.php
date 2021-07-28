<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cliente_id',
        'sapato_id',
        'sapatoqtd',
        'valortotal'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function sapato()
    {
        return $this->belongsTo(Sapato::class);
    }

}
