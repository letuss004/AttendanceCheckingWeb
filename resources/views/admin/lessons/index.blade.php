@extends('layouts.sidebar')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="text-center mb-md-5">{{$course->courseList->name}} Classes</h2>
            <div class="d-flex justify-content-between">
                <div class="my-2">
                    <button type="button" class="btn btn-primary"
                            data-bs-toggle="modal" data-bs-target="#new_class_modal">
                        New lesson
                    </button>
                    <button type="button" class="btn btn-primary"
                            data-bs-toggle="modal" data-bs-target="#add_student_modal">
                        Add student
                    </button>
                    <a class="btn btn-primary" href="/attendances/course/{{$course->id}}">Full</a>
                </div>
                <div class="my-2 search">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </div>
            <table class="table table-striped ">
                <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Attendances</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lessons as $lesson)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td id="id{{$loop->iteration}}">{{$lesson->id}}</td>
                        <td>
                            <a id="n{{$loop->iteration}}" class="text-decoration-none link-dark"
                               href="/lesson/show/{{$lesson->id}}">
                                {{$lesson->name}}
                            </a>
                        </td>
                        <td>{{$lesson->created_at}}</td>
                        <td>{{$lesson->count}}/{{count($students)}}</td>
                        <td>
                            <a id="e{{$loop->iteration}}" class="text-decoration-none link-warning"
                               data-bs-toggle="modal" data-bs-target="#edit_class_modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd"
                                          d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </a>
                            <a id="d{{$loop->iteration}}" class="text-decoration-none link-danger"
                               data-bs-toggle="modal" data-bs-target="#delete_class_modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd"
                                          d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <hr class="mt-lg-5">

        {{--    new table--}}
        <div class="row justify-content-center">
            <h2 class="text-center mb-md-5">Student list</h2>
            <div class="d-flex justify-content-between">
                <div class="my-2">
                    <button id="new_class" type="button" class="btn btn-primary d-none"></button>
                </div>
                <div class="my-2 search">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </div>
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
                @foreach($users as $student)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$student->id}}</td>
                        <td>{{$student->name}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->department->department}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <!-- Add Student Modal -->
    <div class="modal fade" id="add_student_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add student</h5>
                    <select id="add_student_select" class="form-select w-25" aria-label=".form-select example">
                        <option value="1" selected>Excel</option>
                        <option value="2">Json</option>
                        <option value="3">Single</option>
                    </select>
                </div>
                <div class="modal-body">
                    <div id="input_file_div" class="my-3 w-75">
                        <form id="data" method="post" enctype="multipart/form-data">
                            <input id="input_file" class="form-control" type="file">
                        </form>
                    </div>
                    <div id="student_input_div" class="mb-3 w-75 d-none">
                        <label for="student_input" class="form-label">Input students</label>
                        <input id="student_input" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id='add_student_button' class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Create Class Modal -->
    <div class="modal fade" id="new_class_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Create new lesson</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="new_class_name" class="form-label">{{ __('Lesson name') }}</label>
                    <input class="form-control" id="new_class_name" name="new_class_name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="create" type="button" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit lesson Modal -->
    <div class="modal fade" id="edit_class_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit lesson</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="edit_class_name" class="form-label">Lesson name</label>
                    <input class="form-control" id="edit_class_name">
                    <input class="d-none" id="lesson_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="edit_confirm" type="button" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete lesson Modal -->
    <div class="modal fade" id="delete_class_modal" data-bs-backdrop="static" data-bs-keyboard="false"
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="delete_confirm" class="btn btn-danger" data-bs-target="#staticBackdrop"
                            data-bs-dismiss="modal">Delete
                    </button>
                </div>
            </div>
        </div>
    </div>



    {{--  Script  --}}
    <script>
        jQuery(document).ready(function () {
            @foreach($course->lessons as $lesson)
            $('#e{{$loop->iteration}}').click(function (e) {
                e.preventDefault();
                document.getElementById("edit_class_name").value =
                    document.getElementById('n' + {{$loop->iteration}}).innerText;
                document.getElementById("lesson_id").value =
                    document.getElementById('id' + {{$loop->iteration}}).innerText;
            });
            $('#d{{$loop->iteration}}').click(function (e) {
                e.preventDefault();
                document.getElementById("lesson_id").value =
                    document.getElementById('id' + {{$loop->iteration}}).innerText;
            });
            @endforeach

            // add student model option onclick
            $('#add_student_select').on('change', function () {
                    let val = this.value
                    if (val == 1) {
                        $('#input_file_div').removeClass('d-none');
                        $('#student_input_div').addClass('d-none');
                    } else if (val == 2) {
                        $('#input_file_div').addClass('d-none');
                        $('#student_input_div').removeClass('d-none');
                    } else if (val == 3) {
                        $('#input_file_div').addClass('d-none');
                        $('#student_input_div').removeClass('d-none');
                    }
                }
            )
            // create lesson
            jQuery('#create').click(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{ url('/lesson/store') }}",
                    method: 'post',
                    data: {
                        'name': document.getElementById("new_class_name").value,
                        'course_id': {{$course->id}},
                    },
                    success: function (result) {
                        console.log(result)
                        location.reload();
                    }
                });
            });
            // edit lesson
            jQuery('#edit_confirm').click(function (e) {
                e.preventDefault();
                console.log(document.getElementById("edit_class_name").value, document.getElementById("lesson_id").value)
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{ url('/lesson/update') }}",
                    method: 'post',
                    data: {
                        'name': document.getElementById("edit_class_name").value,
                        'lesson_id': document.getElementById("lesson_id").value,
                    },
                    success: function (result) {
                        console.log(result)
                        location.reload();
                    }
                });
            });
            // delete lesson
            jQuery('#delete_confirm').click(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{ url('/lesson/destroy') }}",
                    method: 'post',
                    data: {
                        'lesson_id': document.getElementById("lesson_id").value,
                    },
                    success: function (result) {
                        console.log(result)
                        location.reload();
                    }
                });
            });
            // add student input
            var file;
            $(function () {
                $('#input_file').change(function (e) {
                    file = e.target.files[0];
                    console.log(file);
                })
            })
            jQuery('#add_student_button').click(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{ url('/course/add/student') }}",
                    method: 'post',
                    data: {
                        'option': document.getElementById("add_student_select").value,
                        'course_id': "{{$course->id}}",
                        'student_id': document.getElementById("student_input").value,
                        'json': document.getElementById("student_input").value,
                        'xlsx': file,
                    },
                    success: function (result) {
                        console.log(result)
                        location.reload();
                    }
                });
            });
        });
    </script>
@endsection
