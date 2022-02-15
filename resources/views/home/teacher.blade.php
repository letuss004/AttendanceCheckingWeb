@extends('layouts.app')
@php
    $user = (new App\Models\User)->findOrFail(auth()->user()->getAuthIdentifier());
    $courses = [];
    if (isset($user->teacher->courses)) {
        $courses = $user->teacher->courses;
    }
@endphp
@section('content')
    <div class="container">

        {{--        active courses table--}}
        <div class="row justify-content-center mx-5">
            <h2 class="text-center mb-5">Active Courses</h2>

            <table class="table table-striped table-responsive">
                <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Lessons</th>
                    <th>Lecturer</th>
                    <th>Created by</th>
                    <th>Students</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                </tr>
                @foreach($active as $course)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td id="id_active_course{{$loop->iteration}}">{{$course->id}}</td>
                        <td>
                            <a id="n{{$loop->iteration}}" class="text-decoration-none link-dark"
                               href="/lessons/{{$course->id}}">
                                {{$course->courseList->name}}
                            </a>
                        </td>
                        <td>{{count($course->lessons)}}</td>
                        <td id="tid_active_{{$course->teacher->id}}">{{$course->teacher->user->name}}</td>
                        <td>{{$course->admin->user->name}}</td>
                        <td>{{count($course->students)}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <hr class="mt-lg-5">

        {{--        finished courses table--}}
        <div class="row justify-content-center mx-5">
            <h2 class="text-center ">Finished Courses</h2>
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
                        <td id="t{{$course->teacher->id}}">{{$course->teacher->user->name}}</td>
                        <td>{{$course->admin->user->name}}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
