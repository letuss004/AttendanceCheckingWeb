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
        <div class="row justify-content-center">
            <h2 class="p-0 text-center">Current Classes</h2>
            <div class="d-flex justify-content-between p-0">
                <div class="my-2">
                    <button type="button" class="btn btn-primary d-none">Create new class</button>
                </div>
                <div class="my-2 search">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </div>

            <table class="table table-striped ">
                <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$course->id}}</td>
                        <td>
                            <a class="text-decoration-none link-dark" href="/lessons/{{$course->id}}">
                                {{$course->courseList->name}}
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="col-md-8">
            </div>
        </div>
    </div>
@endsection
