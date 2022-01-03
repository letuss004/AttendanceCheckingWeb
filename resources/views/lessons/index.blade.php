@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <h2 class="text-center pb-2">{{$course->courseList->name}} Classes</h2>
            <div class="d-flex justify-content-between p-0">
                <div class="my-2">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#new_class_modal">New lesson
                    </button>
                </div>
                <div class="my-2 search">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </div>
            <table class="table table-striped ">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Attendances</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($course->lessons as $lesson)
                    <tr>
                        <td>{{$lesson->id}}</td>
                        <td>
                            <a id="n{{$loop->iteration}}" class="text-decoration-none link-dark"
                               href="/lesson/show/{{$lesson->id}}">
                                {{$lesson->name}}
                            </a>
                        </td>
                        <td>{{$lesson->created_at}}</td>
                        <td>{{count($lesson->attendances)}}/{{$student_count}}</td>
                        <td>
                            <button id="e{{$loop->iteration}}" class="text-decoration-none link-warning"
                                    data-bs-toggle="modal" data-bs-target="#edit_class_modal">
                                Edit
                            </button>
                            <button id="d{{$loop->iteration}}" class="text-decoration-none link-danger">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <hr class="pt-1 mt-5">

            <h2 class="text-center pb-2">Student list</h2>
            <div class="d-flex justify-content-between p-0">
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
            <div class="col-md-8">

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
                    <label for="new_class_name" class="form-label">Lesson name</label>
                    <input class="form-control" id="new_class_name">
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
                    <label for="new_class_name" class="form-label">Lesson name</label>
                    <input class="form-control" id="edit_class_name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="create" type="button" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>
    {{--  Script  --}}
    <script>
        jQuery(document).ready(function () {
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
        })
    </script>
    <script>
        function editLesson(id) {
            jQuery(document).ready(function () {
                // edit lesson
                jQuery('#e' + id).click(function (e) {
                    e.preventDefault();
                    document.getElementById("edit_class_name").value = document.get('n' + id).value;
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    jQuery.ajax({
                        url: "{{ url('/lesson/edit') }}",
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
            })
        }
    </script>
    <script>
        function deleteLesson(id) {
            jQuery(document).ready(function () {
                jQuery('#d' + id).click(function (e) {
                    e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    jQuery.ajax({
                        url: "{{ url('/lesson/delete') }}",
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
            })
        }
    </script>
@endsection
