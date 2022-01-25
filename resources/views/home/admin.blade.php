@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row mb-0 m-3">
                    <div class="col-md-6 offset-md-4">
                        <a href="#" class="btn btn-primary" >
                            {{ 'New courses' }}
                        </a>
                    </div>
                </div>

                <div class="row mb-0 m-3">
                    <div class="col-md-6  offset-md-4">
                        <a href="#" class="btn btn-primary" >
                            {{ 'Add user to courses' }}
                        </a>
                    </div>
                </div>

                <div class="row mb-0 m-3">
                    <div class="col-md-6  offset-md-4">
                        <a href="#" class="btn btn-primary" >
                            {{ 'Add student' }}
                        </a>
                    </div>
                </div>
                <div class="row mb-0 m-3">
                    <div class="col-md-6  offset-md-4">
                        <a href="#" class="btn btn-primary" >
                            {{ 'Add courses into courses list' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
