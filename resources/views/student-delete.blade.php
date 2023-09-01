@extends('layouts.mainlayout')
@section('title', 'Student')

@section('content')
    <div class="mt-5">
        <h2>Apakah Anda Yakin Ingin Menghapus data --> {{ $student->name }} <br>
        No Bp : {{ $student->nobp }}</h2>
        
        <form style="display: inline-block" action="/student-destroy/{{ $student->id }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        
        <a href="/students" class="btn btn-primary">Cancel</a>
    </div>
@endsection