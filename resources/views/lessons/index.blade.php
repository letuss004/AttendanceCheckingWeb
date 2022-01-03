@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <h2 class="text-center pb-2">{{$course->courseList->name}} Classes</h2>
            <div class="d-flex justify-content-between p-0">
                <div class="my-2">
                    <a type="button" class="btn btn-primary" href="/lesson/create/{{$course->id}}">New lesson</a>
                </div>
                <div class="my-2 search">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </div>
            <table class="table table-striped ">
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

            <hr class="pt-1 mt-5">

            <h2 class="text-center pb-2">Student list</h2>
            <div class="d-flex justify-content-between p-0">
                <div class="my-2">
                    <button type="button" class="btn btn-primary d-none">Create new class</button>
                </div>
                <div class="my-2 search">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </div>
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
