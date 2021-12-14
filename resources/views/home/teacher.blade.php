@extends('layouts.app')
@php
    $user = (new App\Models\User)->findOrFail(auth()->user()->getAuthIdentifier());
@endphp
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2>Current Courses</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach(\App\Models\Lesson::find($user) as $course)

                    <tr>
                        <td>{{$course->id}}</td>
                        <td>{{$course->name}}</td>
                        <td>john@example.com</td>
                    </tr>
                @endforeach
                <tr>
                    <td>John</td>
                    <td>Doe</td>
                    <td>john@example.com</td>
                </tr>
                <tr>
                    <td>Mary</td>
                    <td>Moe</td>
                    <td>mary@example.com</td>
                </tr>
                <tr>
                    <td>July</td>
                    <td>Dooley</td>
                    <td>july@example.com</td>
                </tr>
                </tbody>
            </table>
            <div class="col-md-8">

            </div>
        </div>
    </div>
@endsection
