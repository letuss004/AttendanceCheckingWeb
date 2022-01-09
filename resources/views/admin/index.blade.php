@extends('layouts.sidebar')
@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <h2 class="text-center ">Active Courses</h2>
            <div class="d-flex justify-content-between">
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
                    <th>Lessons</th>
                    <th>Lecturer</th>
                    <th>Created by</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                </tr>
                @foreach($active as $course)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$course->id}}</td>
                        <td>
                            <a class="text-decoration-none link-dark" href="/lessons/{{$course->id}}">
                                {{$course->courseList->name}}
                            </a>
                        </td>
                        <td>{{count($course->lessons)}}</td>
                        <td>{{$course->teacher->user->name}}</td>
                        <td>{{$course->admin->user->name}}</td>
                        <td>
                            <a id="e{{$loop->iteration}}" class="text-decoration-none link-warning"
                               data-bs-toggle="modal" data-bs-target="#edit_class_modal">
                                Edit
                            </a>
                            <a id="d{{$loop->iteration}}" class="text-decoration-none link-danger"
                               data-bs-toggle="modal" data-bs-target="#delete_class_modal">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row mt-lg-5">
            <hr>
        </div>
        <div class="row justify-content-center ">
            <h2 class="text-center ">Finish Courses</h2>
            <div class="d-flex justify-content-between">
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
                    <th>Lessons</th>
                    <th>Lecturer</th>
                    <th>Created by</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($finished as $course)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$course->id}}</td>
                        <td>
                            <a class="text-decoration-none link-dark" href="/lessons/{{$course->id}}">
                                {{$course->courseList->name}}
                            </a>
                        </td>
                        <td>{{count($course->lessons)}}</td>
                        <td>{{$course->teacher->user->name}}</td>
                        <td>{{$course->admin->user->name}}</td>
                        <td>
                            <a id="e{{$loop->iteration}}" class="text-decoration-none link-warning"
                               data-bs-toggle="modal" data-bs-target="#edit_class_modal">
                                Edit
                            </a>
                            <a id="d{{$loop->iteration}}" class="text-decoration-none link-danger"
                               data-bs-toggle="modal" data-bs-target="#delete_class_modal">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

