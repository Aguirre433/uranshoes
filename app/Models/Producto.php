<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Proveedor;

class Producto extends Model
{
    use HasFactory;

    // Nombre exacto de tu tabla en la base de datos
    protected $table = 'productos'; 

    // Campos que permitimos llenar desde el formulario
    protected $fillable = [
        'nombre', 
        'descripcion', 
        'precio', 
        'talle', 
        'color', 
        'imagen',
        'stock',
        'categoria_id', 
        'marca_id',
        'proveedor_id'
    ];
    public function categoria()
{
    return $this->belongsTo(Categoria::class, 'categoria_id');
}
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id');
    }
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }
}
