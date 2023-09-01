@extends('layouts.mainlayout')
@section('title', 'Student')

@section('content')
    <h2> Anda Sedang Melihat Data-Detail dari siswa yang bernama <br> {{ $student->name }}</h2>

    <div class="my-3 d-flex justify-content-center">
        @if ($student->image !='')
            <img src="{{ asset('storage/photo/'.$student->image) }}" alt="" width="200px">
        @else
            <img src="{{ asset('img/default-user-image.png') }}" alt="" width="200px">
        @endif
    </div>

    <div class="mt-5 mb-5">
        <table class="table table-bordered">
            <tr>
                <th>NO BP</th>
                <th>GENDER</th>
                <th>CLASS</th>
                <th>HOMEROOM TEACHER</th>
            </tr>
            <tr>
                <td>{{ $student->nobp }}</td>
                <td>
                    @if ($student->gender == 'P')
                        Perempuan
                    @else
                        Laki-Laki
                    @endif
                </td>
                <td>{{ $student->class->name }}</td>
                <td>{{ $student->class->homeroomTeacher->name }}</td>
            </tr>
        </table>
    </div>

    <div>
        <h3>Extracurriculars</h3>
        <ol>
            @foreach ($student->extracurriculars as $item)
                <li>{{ $item->name }}</li>
            @endforeach
        </ol>
    </div>


    <style>
        th{
            width: 25%;
        }
    </style>
@endsection