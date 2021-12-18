@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Simple QR Code</h2>
            </div>

            <div class="card-body">
                {!! QrCode::size(300)->generate('https://127.0.0.1:8000/qr/receive/' . $lesson->id . '/' . $qr->id . '/') !!}
            </div>

            <div class="card-body">
                {{'https://127.0.0.1:8000/qr/receive/' . $lesson->id . '/' . $qr->id . '/'}}
            </div>
        </div>
    </div>
@endsection
