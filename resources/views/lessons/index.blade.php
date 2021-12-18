@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2>{{$course->courseList->name}} Classes</h2>
            <a href="/lesson/create/{{$course->id}}">Create new lesson</a>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Attendances</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($course->lessons as $lesson)
                    <tr>
                        <td>{{$lesson->id}}</td>
                        <td>
                            <a class="text-decoration-none link-dark" href="/lesson/show/{{$lesson->id}}">
                                {{$lesson->name}}
                            </a>
                        </td>
                        <td>{{$lesson->created_at}}</td>
                        <td>{{count($lesson->attendances)}}/{{$student_count}}</td>
                        <td>
                            <a class="text-decoration-none link-warning" href="/lesson/edit/{{$lesson->id}}">
                                Edit</a>
                            <a class="text-decoration-none link-danger" href="/lesson/delete/{{$lesson->id}}">
                                Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <h2>Student list</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Dep</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $student)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$student->id}}</td>
                        <td>{{$student->name}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->department->department}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="col-md-8">

            </div>
        </div>
    </div>
@endsection
