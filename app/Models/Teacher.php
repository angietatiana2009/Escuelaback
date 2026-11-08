<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'apellido',
        'telefono',
        'cedula',
    ];

    public function modules()
    {
        return $this->belongsToMany(Module::class, 'modul_teachers', 'teacher_id', 'modulo_id');
    }
}
