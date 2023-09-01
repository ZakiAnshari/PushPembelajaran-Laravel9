@extends('layouts.mainlayout')
@section('title', 'Teacher')

@section('content')
    <h1>Ini Halaman Teacher</h1>

    {{-- <div class="my-5">
        <a href="#" class="btn btn-primary" >Tambah Data + </a>
    </div> --}}

    <h3>Teacher List</h3>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teacherList as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td><a href="teacher-detail/{{ $item->id}}">Detail</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <ol>
        @foreach ($studentList as $data)
            <li>
                {{ $data->name}} | {{ $data->gender }} | {{ $data->nobp}} | {{ $data->class_id}}
            </li>
        @endforeach
    </ol> --}}
@endsection