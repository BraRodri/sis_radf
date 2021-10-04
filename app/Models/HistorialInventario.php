<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialInventario extends Model
{
    use HasFactory;
    protected $table = 'historial_inventario';
    protected $fillable = [
        'inventario_id',
        'cantidad_agregada',
        'cantidad_eliminada',
        'stock_registrado',
        'created_at',
        'updated_at'
    ];
}
