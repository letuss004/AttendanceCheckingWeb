@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="my-4"></h2>

            @if(count($images->toArray()) == 0)
                There is no images
            @endif

            @foreach($images as $image)
                <div class="row align-content-center">
                    <div class="card mb-3 row row-cols-1 m-auto">
                        <div class="row g-0">
                            <div class="col-md-6">
                                <img src=" {{ asset('storage/'.$image->path) }}" class="img-fluid" alt="" align="center">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This content is a little longer.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
