<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carros extends Model
{
    use HasFactory;

    protected $table = 'carros';

    protected $fillable = ['modelo', 'agencia', 'color', 'precio', 'imagen','descripcion'];
}
