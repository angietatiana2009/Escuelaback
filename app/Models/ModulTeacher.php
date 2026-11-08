<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulTeacher extends Model
{

    use HasFactory;


    protected $fillable = [
        'modulo_id',
        'teacher_id',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class, 'modulo_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
