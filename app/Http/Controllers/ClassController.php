<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassController extends Controller
{
    public function index()
    {
        //lazy load => cara request data ketika di butuhkan saja
        // select * from table class
        // select * from student where  class = 1A
        // select * from student where  class = 1B
        // select * from student where  class = 1C
        // $class = Classroom::all();
        
        //eager load => cara rquest data 
        // select * from table class
        // select * from student where class in (1A,1B,1C)
        $class = Classroom::get();
        return view('classroom',['classList'=> $class]);
    }

    public function show($id)
    {
        $class = Classroom::with('students','homeroomTeacher')
        ->findOrFail($id);
        return view('class-detail',['class'=> $class]);
    }
}
