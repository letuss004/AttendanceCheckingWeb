@extends('layouts.sidebar')
@section('content')
    <div class="container">

        {{--        active courses table--}}
        <div class="row justify-content-center mx-5">
            <h2 class="text-center ">Active Courses</h2>
            <div class="d-flex justify-content-between">
                <div class="my-2">
                    <button type="button" class="btn btn-primary"
                            data-bs-toggle="modal" data-bs-target="#new_course_modal">
                        New course
                    </button>
                </div>
                <div class="my-2 search">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </div>

            <table class="table table-striped table-responsive">
                <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Lessons</th>
                    <th>Lecturer</th>
                    <th>Created by</th>
                    <th>Students</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                </tr>
                @foreach($active as $course)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td id="id_active_course{{$loop->iteration}}">{{$course->id}}</td>
                        <td>
                            <a id="n{{$loop->iteration}}" class="text-decoration-none link-dark"
                               href="/lessons/{{$course->id}}">
                                {{$course->courseList->name}}
                            </a>
                        </td>
                        <td>{{count($course->lessons)}}</td>
                        <td id="tid_active_{{$course->teacher->id}}">{{$course->teacher->user->name}}</td>
                        <td>{{$course->admin->user->name}}</td>
                        <td>{{count($course->students)}}</td>
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

        {{--        finished courses table--}}
        <div class="row justify-content-center mx-5">
            <h2 class="text-center ">Finished Courses</h2>
            <div class="d-flex justify-content-between">
                <div class="my-2">
                    <button type="button" class="btn btn-primary d-none">Create new class</button>
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
                    <th>Lessons</th>
                    <th>Lecturer</th>
                    <th>Created by</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($finished as $course)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$course->id}}</td>
                        <td>
                            <a class="text-decoration-none link-dark" href="/lessons/{{$course->id}}">
                                {{$course->courseList->name}}
                            </a>
                        </td>
                        <td>{{count($course->lessons)}}</td>
                        <td id="t{{$course->teacher->id}}">{{$course->teacher->user->name}}</td>
                        <td>{{$course->admin->user->name}}</td>
                        <td class="text-center">
                            <a id="e2{{$loop->iteration}}" class="text-decoration-none link-warning"
                               data-bs-toggle="modal" data-bs-target="#edit_class_modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd"
                                          d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <input class="d-none" id="tmp_value">


    <!-- Create Class Modal -->
    <div class="modal fade" id="new_course_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Create new course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <select id="lecturer_select" class="form-select w-50 mb-3" aria-label=".form-select example">
                        <option selected>Choose lecturer</option>
                        @foreach($lecturers as $lecturer )
                            <option value="{{$lecturer->user->id}}">{{$lecturer->user->name}}</option>
                        @endforeach
                    </select>

                    <select id="courses_select" class="form-select w-50" aria-label=".form-select example">
                        <option selected>Choose courses</option>
                        @foreach($coursesList as $coursesName )
                            <option value="{{$coursesName->id}}">{{$coursesName->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="create" type="button" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit course Modal -->
    <div class="modal fade" id="edit_class_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit course</h5>
                </div>
                <div class="modal-body">
                    <select id="lecturer_select_edit" class="form-select w-50 mb-3" aria-label=".form-select example">
                        <option selected>Choose lecturer</option>
                        @foreach($lecturers as $lecturer )
                            <option value="{{$lecturer->user->id}}">
                                {{$lecturer->user->id . ' ' . $lecturer->user->name}}
                            </option>
                        @endforeach
                    </select>

                    <select id="status_edit" class="form-select w-50 mb-3" aria-label=".form-select example">
                        <option>Choose status</option>
                        <option selected value="1">Active</option>
                        <option value="0">Finish</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="edit_confirm" type="button" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete course Modal -->
    <div class="modal fade" id="delete_class_modal" data-bs-backdrop="static" data-bs-keyboard="false"
         aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel2">Delete course</h5>
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
    <!-- Finish course Modal -->
    <div class="modal fade" id="finish_class_modal" data-bs-backdrop="static" data-bs-keyboard="false"
         aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Finish this course</h5>
                </div>
                <div class="modal-body">
                    <p>Are you sure?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="finish_confirm" class="btn btn-danger" data-bs-target="#staticBackdrop"
                            data-bs-dismiss="modal">Finish
                    </button>
                </div>
            </div>
        </div>
    </div>



    {{--  Script  --}}
    <script>
        jQuery(document).ready(function () {
            @foreach($active as $course)
            jQuery('#e{{$loop->iteration}}').click(function (e) {
                e.preventDefault();
                document.getElementById("lecturer_select_edit").value = "{{$course->teacher->id}}"
                document.getElementById("tmp_value").value = "{{$course->id}}";
            });
            jQuery('#d{{$loop->iteration}}').click(function (e) {
                e.preventDefault();
                document.getElementById("tmp_value").value = "{{$course->id}}";
            });
            @endforeach

            @foreach($finished as $course)
            jQuery('#e2{{$loop->iteration}}').click(function (e) {
                e.preventDefault();
                document.getElementById("lecturer_select_edit").value = "{{$course->teacher->id}}"
                document.getElementById("tmp_value").value = "{{$course->id}}";
            });
            @endforeach

            // create lesson
            jQuery('#create').click(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{ url('/course/create') }}",
                    method: 'post',
                    data: {
                        'name': document.getElementById("courses_select").value,
                        'lecturer': document.getElementById("lecturer_select").value,
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
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{ url('/course/edit/') }}",
                    method: 'post',
                    data: {
                        'id': document.getElementById("tmp_value").value,
                        'teacher_id': document.getElementById("lecturer_select_edit").value,
                        'status': document.getElementById("status_edit").value,
                    },
                    success: function (result) {
                        console.log(result)
                        location.reload();
                    }
                });
            });
            // delete
            jQuery('#delete_confirm').click(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{ url('/course/destroy/') }}",
                    method: 'post',
                    data: {
                        'id': document.getElementById("tmp_value").value,
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

