@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2>{{$lesson->name}}</h2>
            <a href="/qr/generate/{{$lesson->id}}">Create QR</a>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Dep</th>
                    <th>Status</th>
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
                        <td>{{$student->status}}</td>
                    </tr>
                @endforeach
                </tbody>
                </tbody>
            </table>
            <div class="col-md-8">

            </div>
        </div>
    </div>
@endsection
