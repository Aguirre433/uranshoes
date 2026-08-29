<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comprobantes;

class Cliente extends Model
{
    /** @use HasFactory<\Database\Factories\ClientesFactory> */
    use HasFactory;
    protected $fillable = [
        'nombre',
        'email',
        'telefono',
    ];

    public function comprobantes()
    {
        return $this->hasMany(Comprobantes::class, 'cliente_id');
    }
}
