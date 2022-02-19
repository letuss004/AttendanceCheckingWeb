@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="my-4 text-center ">Attendance missing</h2>

            <div class="row m-auto mb-5">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#atten-modal">
                    Add Attendance For This Student
                </button>
            </div>

            <p class="text-center">There is no image</p>
        </div>
    </div>


    <div class="modal fade" id="atten-modal" data-bs-backdrop="static" data-bs-keyboard="false"
         aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel2">Add Attendance</h5>
                </div>
                <div class="modal-body">
                    <p>Are you sure?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="atten-btn" class="btn btn-primary" data-bs-target="#staticBackdrop"
                            data-bs-dismiss="modal">Add
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
                    'type': 1,
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
