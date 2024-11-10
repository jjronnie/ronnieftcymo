@extends('layouts.app')

@section('content')
    <h2>Enroll {{ $student->name }} in a Course</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('students.enroll.store', $student->id) }}" method="POST">
        @csrf
        <label for="course_id">Select Course:</label>
        <select name="course_id" id="course_id">
            @foreach($courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }}</option>
            @endforeach
        </select>

        <button type="submit">Enroll</button>
    </form>
@endsection
