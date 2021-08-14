<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardia extends Model
{
    use HasFactory;
    protected $table = 'guardias';

    protected $fillable = [
        'user_id', 'descripcion', 'fecha_inicio', 'fecha_fin'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
