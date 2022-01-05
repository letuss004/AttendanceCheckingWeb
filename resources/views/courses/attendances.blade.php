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
    <div class="row justify-content-center m-0">
        <table class="table table-striped table-bordered table-responsive-xxl text-center">
            <thead class="table-dark">
            <tr>
                <td class="align-middle">#</td>
                <td class="align-middle">ID</td>
                <td class="align-middle">Name</td>
                <td class="align-middle">Dept</td>
                @foreach($lessons as $lesson)
                    <td class="align-middle w-25" colspan="{{count($lesson->qrs)}}">
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
                                    <td>x</td>
                                @else
                                    <td>.</td>
                                @endif
                            @endforeach
                        @else
                            <td></td>
                        @endif
                    @endforeach
                    <td class="align-middle">{{array_count_values($student->status)[1]}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
