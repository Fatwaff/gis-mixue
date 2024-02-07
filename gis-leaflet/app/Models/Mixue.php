<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mixue extends Model
{
    protected $table = 'mixue';
    use HasFactory;

    protected $fillable = [
        'namacabang',
        'alamat',
        'jam_operasional',
        'no_telp',
        'fasilitas',
        'foto',
        'latitude',
        'longitude',
    ];
}
