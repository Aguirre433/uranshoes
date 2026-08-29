<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Factura;
// Refer to related models by fully-qualified class names to avoid unresolved import errors

class Provincia extends Model
{
    /** @use HasFactory<\Database\Factories\ProvinciaFactory> */
    use HasFactory;
    protected $fillable = [
        'nombre',
        'municipio',
        'codigo_postal',
        'departamento_partido',
    ];

    public function facturas()
    {
        return $this->hasMany(Factura::class, 'provincia_id');
    }
    
}
