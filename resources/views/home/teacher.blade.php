@extends('layouts.app')
@php
    $user = (new App\Models\User)->findOrFail(auth()->user()->getAuthIdentifier());
    $courses = $user->teacher->courses;
@endphp
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2>Current Classes</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td>{{$course->id}}</td>
                        <td>
                            <a class="text-decoration-none link-dark" href="/lessons/{{$course->id}}">
                                {{$course->courseList->name}}
                            </a>
                        </td>
                        <td>Button Button</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="col-md-8">

            </div>
        </div>
    </div>
@endsection
