<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archives_groups extends Model
{
    use HasFactory;
    protected $table = 'archives_groups';

    protected $fillable = [
        'archive_id', 'archivo', 'active'
    ];
}
