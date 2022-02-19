@extends('layouts.sidebar')
@section('content')
    <div class="container">
        <div class="row justify-content-center mx-5">
            <h2 class="text-center pb-md-5">{{$lesson->name}}</h2>
            <div class="d-flex justify-content-between p-0">
                <div class="my-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#createQrModal">QR Scan
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
                    @foreach($lesson->qrs as $qr)
                        <th>{{$loop->iteration}}</th>
                    @endforeach
                    <th class="text-center">Status</th>
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
                        @foreach($lesson->qrs as $qr)
                            @if($qr->attendances->contains('student_id', '=', $student->id))
                                <td>
                                    <a href="/attendances/show/{{$qr->attendances->firstWhere('student_id', '=', $student->id)->id}}/{{$qr->id.'/'.$student->id}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-check2 text-success" viewBox="0 0 16 16">
                                            <path
                                                d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                        </svg>
                                    </a>
                                </td>
                            @else
                                <td>
                                    <a href="{{ ('/not/atten/show/'.$qr->id.'/'.$student->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-x-lg text-danger" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                            <path fill-rule="evenodd"
                                                  d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                                        </svg>
                                    </a>
                                </td>
                            @endif
                        @endforeach
                        <td class="text-center">
                            @if($student->status == 1)
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                     fill="currentColor" class="bi bi-check2 text-success" viewBox="0 0 16 16">
                                    <path
                                        d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                     fill="currentColor" class="bi bi-x-lg text-danger" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                    <path fill-rule="evenodd"
                                          d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                                </svg>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="createQrModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="createQrModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createQrModalLabel">Options</h5>
                    <select id="qr_select" class="form-select w-25" aria-label=".form-select example">
                        <option selected value="1">Create</option>
                        <option value="2">Resume</option>
                        <option value="3">Delete</option>
                    </select>
                </div>
                <div class="modal-body">
                    <label id="qr_name_label" for="qr_name" class="form-label">QR name</label>
                    <input class="form-control" id="qr_name">
                    <span id="invalid_feedback" class="invalid-feedback" role="alert">
                        <strong id="invalid_message">asfasf</strong>
                    </span>
                    {{--  --}}
                    <select id="qr_list" class="form-select d-none" aria-label=".form-select example">
                        <option selected>Choose QR here</option>
                        @foreach($lesson->qrs as $qr)
                            <option value="{{$qr->id}}">{{$qr->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button id='first_modal_close' type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button id="qr_perform" class="btn btn-primary" data-bs-target="#staticBackdrop"
                            data-bs-toggle="modal" data-bs-dismiss="modal">
                        Perform
                    </button>
                </div>
            </div>
        </div>
    </div>
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
                <div class="modal-header ">
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
        jQuery(document).ready(function () {
                $('#qr_select').on('change', function () {
                        let val = this.value
                        if (val == 1) {
                            $('#qr_name').removeClass('d-none');
                            $('#qr_name_label').removeClass('d-none');
                            $('#qr_list').addClass('d-none');

                            $('#qr_perform').attr('data-bs-target', "#staticBackdrop")
                                .attr('data-bs-toggle', 'modal')
                                .attr('data-bs-dismiss', 'modal')
                        } else if (val == 2) {
                            $('#qr_name').addClass('d-none');
                            $('#qr_name_label').addClass('d-none');
                            $('#qr_list').removeClass('d-none');
                        } else if (val == 3) {
                            $('#qr_name').addClass('d-none');
                            $('#qr_name_label').addClass('d-none');
                            $('#qr_list').removeClass('d-none');

                            $('#qr_perform').removeAttr('data-bs-target')
                                .removeAttr('data-bs-toggle')
                                .removeAttr('data-bs-dismiss')
                        }
                    }
                )
            }
        )

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

        function setError() {

        }

        jQuery(document).ready(function () {
            let qr_id;
            let qr_option
            jQuery('#qr_perform').click(function (e) {
                e.preventDefault();

                qr_id = $('#qr_list').val();
                qr_option = $('#qr_select').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // logic
                if (qr_option == 1) {
                    jQuery.ajax({
                        url: "{{ url('/qr/generate/') }}",
                        method: 'post',
                        data: {
                            'lesson_id': {{$lesson->id}},
                            'name': document.getElementById('qr_name').value,
                        },
                        success: function (result) {
                            qr_id = result["qr"]
                            const content = 'https://' + $('meta[name="csrf-token"]').attr('content') + '/attendance/' + {{$lesson->id}} + '/' + qr_id;
                            generateQRCode(content);
                        }, error: function (jqXHR) {
                            const {responseJSON} = jqXHR
                            const {message} = responseJSON
                            // $('#invalid_message').innerText = message
                            // $('#invalid_feedback').addClass('is-invalid')
                        }
                    });
                } else if (qr_option == 2) {
                    jQuery.ajax({
                        url: "{{ url('/qr/edit/') }}",
                        method: 'post',
                        data: {
                            'lesson_id': {{$lesson->id}},
                            'qr_id': qr_id,
                        },
                        success: function (result) {
                            console.log(result)
                            const content = 'https://' + $('meta[name="csrf-token"]').attr('content') + '/attendance/' + {{$lesson->id}} + '/' + qr_id;
                            generateQRCode(content);
                        }
                    });
                } else if (qr_option == 3) {
                    jQuery.ajax({
                        url: "{{ url('/qr/destroy/') }}",
                        method: 'post',
                        data: {
                            'lesson_id': {{$lesson->id}},
                            'qr_id': qr_id,
                        },
                        success: function (result) {
                            location.reload();
                            console.log(result)
                        }
                    });
                }
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
                        location.reload();
                    }
                });
            });
            //

        })
    </script>

@endsection
