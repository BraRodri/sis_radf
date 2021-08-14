<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brigada_users extends Model
{
    use HasFactory;
    protected $table = 'brigada_users';

    protected $fillable = [
        'brigada_id', 'user_id', 'active'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
