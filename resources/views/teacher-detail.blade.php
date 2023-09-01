@extends('layouts.mainlayout')
@section('title', 'Teacher')

@section('content')
    <h2> Anda Sedang Melihat Data-Detail dari Teacher  {{ $teacher->name }}</h2>

    <div class="mt-5">
        <h3>Class : 
            @if ($teacher->class)
                {{  $teacher->class->name  }}
            @else
                Tidak Ada
            @endif
        </h3>
    </div>

    <div class="mt-5">
        <h4>List Student</h4>
        @if($teacher->class)
        <ol>
            @foreach ($teacher->class->students as $item)
                <li>{{ $item->name}}</li>
            @endforeach
        </ol>
        @endif
    </div>

@endsection