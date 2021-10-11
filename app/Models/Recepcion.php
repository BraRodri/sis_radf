<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recepcion extends Model
{
    use HasFactory;
    protected $table = 'recepcion';
    protected $fillable = [
        'user_id',
        'documento_user',
        'hora_entrada',
        'hora_salida',
        'motivo_ingreso',
        'motivo_egreso',
        'imagen',
        'created_at',
        'updated_at'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
