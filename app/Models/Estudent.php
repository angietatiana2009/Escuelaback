<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudent extends Model
{
    use HasFactory;

    protected $table = 'estudents';

    protected $fillable = [
        'name',
        'apellido',
        'fecha_nacimiento',
        'expediente',
    ];
}