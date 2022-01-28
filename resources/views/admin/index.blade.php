@extends('layouts.sidebar')
@section('content')
    <div class="row justify-content-center mx-5">
        <h2 class="text-center ">All Admin</h2>
        <div class="d-flex justify-content-between">
            <div class="my-2">
                <button type="button" class="btn btn-primary"
                        data-bs-toggle="modal" data-bs-target="#add_student_modal">
                    Add
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
                <th>Email</th>
                <th>Username</th>
                <th>Department</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->department->department}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



    <!-- Add Student Modal -->
    <div class="modal fade" id="add_student_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add admin</h5>
                    <select id="add_student_select" class="form-select w-25" aria-label=".form-select example">
                        <option value="1" selected>Excel</option>
                        <option value="2">Json</option>
                        <option value="3">Single</option>
                    </select>
                </div>
                <div class="modal-body">
                    <input id="input_file" class="form-control" type="file">
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



    {{--  Script  --}}
    <script>
        jQuery(document).ready(function () {
            // add student model option onclick
            $('#add_student_select').on('change', function () {
                    let val = this.value
                    if (val == 1) {
                        $('#input_file').removeClass('d-none');
                        $('#student_input_div').addClass('d-none');
                        $('#option').value = 1;
                    } else if (val == 2) {
                        $('#input_file').addClass('d-none');
                        $('#student_input_div').removeClass('d-none');
                        $('#option').value = 2;
                    } else if (val == 3) {
                        $('#input_file').addClass('d-none');
                        $('#student_input_div').removeClass('d-none');
                        $('#option').value = 3;
                    }
                }
            )
            // add student input ==================================================================
            let file;
            $(function () {
                $('#input_file').change(function (e) {
                    file = e.target.files[0];
                })
            })
            jQuery('#add_student_button').click(function (e) {
                e.preventDefault();
                let data = new FormData();
                let input = $('#student_input').val();

                data.append('option', $('#add_student_select').val())
                data.append('student_id', input)
                data.append('json', input)
                data.append('xlsx', file)

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    enctype: 'multipart/form-data',
                    url: "{{ route('admin.create') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 600000,
                    success: function (data) {
                        console.log(data);
                        location.reload();
                    },
                    error: function (e) {
                        console.log(e)
                    }
                });
            });
        });
    </script>
@endsection
