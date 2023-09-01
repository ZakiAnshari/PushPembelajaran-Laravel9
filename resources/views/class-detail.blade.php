@extends('layouts.mainlayout')
@section('title', 'Class')

@section('content')
    <h2> Anda Sedang Melihat Data-Detail dari Class  {{ $class->name }}</h2>

    <div class="mt-5">
        <h3> homeroomTeacher : {{ $class->homeroomTeacher->name }}</h3>

    </div>

    <div class="mt-5">
        <h4>Student-List</h4>
        <ol>
            @foreach($class->students as $item) 
                <li>{{ $item->name }}</li>
            @endforeach
        </ol>
    </div>

@endsection