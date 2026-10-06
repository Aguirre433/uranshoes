<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Actividad extends Model
{
    use HasFactory;

    protected $table = 'actividads';

    protected $fillable = [
        'titulo',
        'descripcion',
        'tipo',
        'user_id',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'user_id');
    }
}