@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Simple QR Code</h2>
            </div>


            <div class="card-body">
                <a href="{{'/attendance/' . $lesson->id . '/' . $qr->id . '/'. 'BA9044'}}">
                    {{'https://127.0.0.1:8000/attendance/' . $lesson->id . '/' . $qr->id . '/BA9044'}}
                </a>
            </div>
        </div>
    </div>
@endsection
