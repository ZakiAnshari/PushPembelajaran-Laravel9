@extends('layouts.mainlayout')
@section('title', 'Student')

@section('content')
    <h1>Ini Halaman Student</h1>
    @if(Auth::user()->role_id == 1)
    <div class="my-5 d-flex justify-content-between">
        <a href="student-add" class="btn btn-primary" >Tambah Data + </a>
        <a href="student-deleted" class="btn btn-info" >Show Deleted Data</a>
    </div>
    @endif

    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <h3>Student List</h3>
    
    <div class="my-3 col-12 col-sm-8 col-md-8">
        <form action="" method="get">
            <div class="input-group mb-3 ">
                <input type="text" class="form-control" name="keyword"  placeholder="keyword">
                <button class=" btn btn-primary input-group-text">Search</button>
            </div>
        </form>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Gender</th>
                <th>NoBp</th>
                <th>Class</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($studentList as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->gender }}</td>
                    <td>{{ $data->nobp }}</td>
                    <td>{{ $data->class->name }}</td>
                    <td>
                        <div>
                            @if(Auth::user()->role_id !=1 && Auth::user()->role_id !=2)
                            -
                            @else
                            <button type="button" class="btn btn-primary">
                                <a href="student/{{ $data->id }}">Detail</a>
                            </button>
                            <button type="button" class="btn btn-success">
                                <a href="student-edit/{{ $data->id }}">Edit</a>
                            </button>
                            @endif

                            @if(Auth::user()->role_id == 1)
                            <button type="button" class="btn btn-danger">
                                <a href="student-delete/{{ $data->id }}">Delete</a>
                            </button>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <style>
        a{
            text-decoration: none;
            color: white;
        }
        td{
            width: 30px;
        }
    </style>

    <div class="my-5">
        {{ $studentList->withQueryString()->links() }}
    </div>
@endsection