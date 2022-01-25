@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach($images as $image)
                <div class="card" style="width: 18rem;">
                    <img src="{{$image->path}}" class="card-img-top" alt="">
                    <div class="card-body">
                        <p class="card-text">
                            Some quick example text to build on the card title and make up the bulk of
                            the card's content.
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
