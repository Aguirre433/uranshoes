<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores';

    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'direccion',
        'cuit',
        'provincia_id',
        'municipio_id',
        'categoria_id',
    ];

    public function categoria()
{
    return $this->belongsTo(Categoria::class);
}
    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
    }
    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }
}