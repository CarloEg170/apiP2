<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Autor extends Model
{

    protected $table = 'autor';
    protected $fillable = [
        'nome',
        'data_nacimento',
        'biografia',
    ];
}
