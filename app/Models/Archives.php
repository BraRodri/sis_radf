<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archives extends Model
{
    use HasFactory;
    protected $table = 'archives';

    protected $fillable = [
        'name', 'user_id', 'active'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function groups(){
        return $this->hasMany(Archives_groups::class, 'archive_id');
    }
}
