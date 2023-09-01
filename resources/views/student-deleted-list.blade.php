@extends('layouts.mainlayout')
@section('title', 'Student')

@section('content')
    <h1>Ini Halaman Student yang sudah di delete</h1>

    <div class="my-5 ">
        <a href="/students" class="btn btn-primary" >Kembali</a>
    </div>

    <div class="mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>NoBp</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($student as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->gender }}</td>
                        <td>{{ $data->nobp }}</td>
                        <td><a href="/student/{{ $data->id }}/restore">Restores</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection