<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class student extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        'gender',
        'nobp',
        'class_id',
        'image',
    ];
    
    public function class()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function extracurriculars()
    {
        return $this->belongsToMany(Extracurricular::class, 'student_extracurricular', 'student_id', 'extracurricular_id');
    }
}
