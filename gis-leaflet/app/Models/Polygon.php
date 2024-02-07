<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polygon extends Model
{
    protected $table = 'polygon';
    use HasFactory;

    protected $fillable = [
        'marker_id',
        'longitude',
        'latitude'
    ];
}
