@extends('layouts.mainlayout')
@section('title', 'Classroom')

@section('content')
    <h1>Ini Halaman Classroom</h1>
    
    {{-- <div class="my-5">
        <a href="#" class="btn btn-primary" >Tambah Data + </a>
    </div> --}}

    <h3>Student List</h3>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classList as $data)
                <tr>
                    <td> {{ $loop->iteration }}</td>
                    <td>{{ $data->name}}</td>
                    <td> <a href="class-detail/{{ $data->id }}">Detail</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection