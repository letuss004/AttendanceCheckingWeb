@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2>{{$lesson->name}}</h2>
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

                </tbody>
            </table>
            <div class="col-md-8">

            </div>
        </div>
    </div>
@endsection
