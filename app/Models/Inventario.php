<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;
    protected $table = 'inventario';
    protected $fillable = [
        'categoria_inventario_id',
        'nombre',
        'stock_currently',
        'descripcion',
        'estado',
        'created_at',
        'updated_at'
    ];
}
