@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="p-0 text-center">{{$lesson->name}}</h2>
            <div class="d-flex justify-content-between p-0">
                <div class="my-2">
                    <button id="qr_scan" type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">QR Scan
                    </button>

                </div>

                <label class="my-2 search">
                    <input type="text" class="form-control" placeholder="Search">
                </label>
            </div>
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
            </table>
            <div class="col-md-8">

            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Attendance QR code</h5>
                </div>
                <div class="modal-body text-center">
                    <div id="qr_value" class="card-body justify-content-center">
                        <canvas id="qr-code"></canvas>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal"
                            data-bs-dismiss="modal">Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalToggle2" data-bs-backdrop="static" data-bs-keyboard="false"
         aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
         tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel2">Close QR</h5>
                </div>
                <div class="modal-body">
                    <p>Are you sure?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#staticBackdrop"
                            data-bs-toggle="modal" data-bs-dismiss="modal">Back
                    </button>
                    <button id="qr_close" class="btn btn-danger " data-bs-target="#staticBackdrop"
                            data-bs-dismiss="modal">Close
                    </button>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
    <script>
        function generateQRCode(qrtext) {
            let qr = new QRious(
                {
                    element: document.getElementById('qr-code'),
                }
            );

            qr.set({
                foreground: 'black',
                size: 400,
                value: qrtext
            });
        }

        jQuery(document).ready(function () {
            let qr_id;
            jQuery('#qr_scan').click(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{ url('/qr/generate/') }}",
                    method: 'post',
                    data: {
                        'lesson_id': {{$lesson->id}}
                    },
                    success: function (result) {
                        qr_id = result["qr"]
                        const content = 'https://127.0.0.1:8000/attendance/' + {{$lesson->id}} + '/' + qr_id;
                        generateQRCode(content);
                    }
                });
            });
            //   2nd
            jQuery('#qr_close').click(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{ url('/qr/close/') }}",
                    method: 'post',
                    data: {
                        'qr_id': qr_id
                    },
                    success: function (result) {
                        console.log(result)
                    }
                });
            });
        })
    </script>
@endsection
