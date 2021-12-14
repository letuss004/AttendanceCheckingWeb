@extends('layouts.app')

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
                @foreach($course->lessons as $lesson)
                    <tr>
                        <td>{{$lesson->id}}</td>
                        <td>
                            {{$lesson->name}}
                        </td>
                        <td>Edit Delete</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="col-md-8">

            </div>
        </div>
    </div>
@endsection
