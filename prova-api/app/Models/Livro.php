<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class livro extends Model
{
    protected $table = 'livros';
    protected $fillable = [
        'titulo',
        'sinopse',
    ];
}
