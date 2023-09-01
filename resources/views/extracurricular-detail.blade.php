@extends('layouts.mainlayout')
@section('title', 'Extracurricular')

@section('content')
    <h2> Anda Sedang Melihat Data-Detail dari Extracurricular  {{ $ekskul->name }}</h2>

    <div class="mt-5">
        <h3>List Peserta</h3>
    </div>

    <ol>
        @foreach ($ekskul->students as $item)
            <li>{{ $item->name }}</li>
        @endforeach
    </ol>
    
@endsection