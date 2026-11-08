<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

   

    protected $fillable = [
        'codigo',
        'nombre',
    ];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'modul_teachers', 'modulo_id', 'teacher_id');
    }
}
