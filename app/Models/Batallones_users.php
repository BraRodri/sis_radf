<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batallones_users extends Model
{
    use HasFactory;
    protected $table = 'batallon_users';

    protected $fillable = [
        'batallon_id', 'user_id', 'active'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
