<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container pe-auto">
    <div class="row justify-content-center ">
        <table id="data_table" class="table table-striped table-bordered table-responsive-xxl text-center">
            <thead class="table-dark">
            <tr>
                <td class="align-middle">#</td>
                <td class="align-middle">ID</td>
                <td class="align-middle">Name</td>
                <td class="align-middle">Dept</td>
                @foreach($lessons as $lesson)
                    <td class="align-middle w-auto" colspan="{{count($lesson->qrs)}}">
                        {{$lesson->name}}
                    </td>
                @endforeach
                <td class="align-middle">Count</td>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $student)
                <tr>
                    <td class="align-middle">{{$loop->iteration}}</td>
                    <td class="align-middle">{{$student->id}}</td>
                    <td class="align-middle text-start text-nowrap">{{$student->name}}</td>
                    <td class="align-middle text-break">{{$student->department->department}}</td>
                    @foreach($lessons as $lesson)
                        @if(count($lesson->qrs) > 0)
                            @foreach($lesson->qrs as $qr)
                                @if($qr->attendances->contains('student_id', '=', $student->id))
                                    <td>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-check2 text-success" viewBox="0 0 16 16">
                                            <path
                                                d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                        </svg>
                                    </td>
                                @else
                                    <td>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-x-lg text-danger" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                            <path fill-rule="evenodd"
                                                  d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                                        </svg>
                                    </td>
                                @endif
                            @endforeach
                        @else
                            <td></td>
                        @endif
                    @endforeach
                    <td class="align-middle">
                        @if(count($student->status) != 0)
                            @if(in_array(1, $student->status))
                                {{array_count_values($student->status)[1]}}
                            @else
                                0
                            @endif
                        @else
                            x
                        @endif
                    </td>
                </tr>
            @endforeach

            </tbody>
            <tfoot>
            <td>
                <button id="export">Export</button>
            </td>
            </tfoot>
        </table>
    </div>
</div>
</body>
<script>
    $(document).ready(function () {
        $('#export').click(function (e) {
            $("#data_table").table2excel({
                exclude: ".excludeThisClass",
                name: "Worksheet Name",
                filename: "attenData.xls", // do include extension
                preserveColors: false // set to true if you want background colors and font colors preserved
            });
        })
    });
</script>
</html>
