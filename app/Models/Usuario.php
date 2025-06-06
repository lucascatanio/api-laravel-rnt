<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'nome',
        'email',
        'senha',
    ];

    // Esconde a senha nas repostas json
    protected $hidden = [
        'senha',
    ];
     protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
