<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permisos extends Model
{
    use HasFactory;

    protected $table = 'permisos';

    protected $fillable = [
        'n_boleta',
        'batallon',
        'user_id',
        'nombre_soldado',
        'cedula_soldado',
        'telefono_soldado',
        'fecha_salida',
        'fecha_entrada',
        'guarnicion',
        'destino',
        'motivo',
        'pdf'
    ];
}
