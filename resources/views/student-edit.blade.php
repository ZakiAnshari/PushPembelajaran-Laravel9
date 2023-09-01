@extends('layouts.mainlayout')
@section('title', 'Student Edit')

@section('content')



<div class="mt-5 col-8 m-auto">
    <form action="/student/{{ $student->id }}" method="POST">
        @method('PUT')
        @csrf

        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control"  id="name" name="name" value="{{ $student->name }}" required>
        </div>

        <div class="mb-3">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control"  required>
                <option value="{{ $student->gender }}">{{ $student->gender }}</option>
                @if ($student->gender == 'L')
                    <option value="P">P</option>
                @else
                    <option value="L">L</option>
                @endif
            </select>
        </div>

        <div class="mb-3">
            <label for="nobp">No Bp</label>
            <input type="text" class="form-control" name="nobp" id="nobp" value="{{ $student->nobp}}" required>
        </div>

        <div class="mb-3">
            <label for="class">Class</label>
            <select name="class_id" id="class" class="form-control" required >
                <option value="{{ $student->class->id}}">{{ $student->class->name }}</option>
                @foreach ($class as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        

        <div class="mb-3">
            <button class="btn btn-success" type="submit">Update</button>
        </div>
    </form>
</div>
@endsection