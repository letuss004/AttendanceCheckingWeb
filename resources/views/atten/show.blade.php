@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="my-4 text-center ">Attended</h2>

            <div class="row m-auto mb-5">
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#atten-modal">
                    Remove Attendance For This Student
                </button>
            </div>

            @if(count($images->toArray()) == 0)
                <p class="text-center">There is no images</p>
            @endif

            @foreach($images as $image)
                <div class="row align-content-center">
                    <div class="card mb-3 row row-cols-1 m-auto">
                        <div class="row g-0">
                            <div class="col-md-6">
                                <img src=" {{ asset('storage/'.$image->path) }}" class="img-fluid" alt=""
                                     align="center">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>


                                    <script>
                                        jQuery('#atten-btn').click(function (e) {
                                            e.preventDefault();
                                            $.ajaxSetup({
                                                headers: {
                                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                }
                                            });
                                            jQuery.ajax({
                                                url: "{{ url('/atten/change') }}",
                                                method: 'post',
                                                data: {
                                                    'user_id': " {{$user->id}}",
                                                    'qr_id': " {{$qr->id}}",
                                                    'type': 0,
                                                },
                                                success: function (result) {
                                                    console.log(result);
                                                    let split = window.location.href.split('/')
                                                    let base = split[0] + "//" + split[1] + "/" + split[2]
                                                    let url = window.location.href.substr(0, base.length)
                                                    window.location = url + 'lesson/show' + '/' + result['lesson_id']
                                                }
                                            });
                                        });

                                    </script>
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

    <div class="modal fade" id="atten-modal" data-bs-backdrop="static" data-bs-keyboard="false"
         aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel2">Remove Attendance</h5>
                </div>
                <div class="modal-body">
                    <p>Are you sure?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="atten-btn" class="btn btn-danger" data-bs-target="#staticBackdrop"
                            data-bs-dismiss="modal">Remove
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        jQuery('#atten-btn').click(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "{{ url('/atten/change') }}",
                method: 'post',
                data: {
                    'user_id': " {{$user->id}}",
                    'qr_id': " {{$qr->id}}",
                    'type': 0,
                },
                success: function (result) {
                    console.log(result);
                    let split = window.location.href.split('/')
                    let base = split[0] + "//" + split[1] + "/" + split[2]
                    let url = window.location.href.substr(0, base.length)
                    window.location = url + 'lesson/show' + '/' + result['lesson_id']
                }
            });
        });

    </script>
@endsection
