<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Qr;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \App\Models\Image;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(int $course_id)
    {
        $course = Course::findOrFail($course_id);
        $users = [];
        $students = $course->students;
        $lessons = $course->lessons;
        foreach ($students as $student) {
            $user = User::findOrFail($student->id);
            $attendanceStatus = [];
            foreach ($lessons as $lesson) {
                $status = $this->attendanceCondition($user, $lesson);
                array_push($attendanceStatus, $status);
            }
            array_push($users, $user->setAttribute('status', $attendanceStatus));
        }
        return view('atten/attendances', compact('users', 'lessons'));
    }

    /**
     * @param User $user
     * @param Lesson $lesson
     * @return int 0 = abs || 1 = attendance
     */
    private function attendanceCondition(User $user, Lesson $lesson): int
    {
        $result = 1;
        if (count($lesson->qrs) > 0) {
            foreach ($lesson->qrs as $qr) {
                if (!$qr->attendances->contains('student_id', '=', $user->id)) {
                    $result = 0;
                    break;
                }
            }
        }
        return $result;
    }

    /**
     * Show the form for creating a new resource.
     * Request data convention: b: back, f: front, s: status
     * @return
     */
    public function create(Request $request)
    {
        $user = User::find(auth()->user()->getAuthIdentifier());
        $attendance = Attendance::create([
            'attendance_status_id' => 1,
            'qr_id' => 1,
            'lesson_id' => 1,
            'student_id' => 'BA9067'
        ]);

        $image = Image::create([
            'attendance_id' => $attendance->id,
            'path' => "test Test TEST",
        ]);
        dd($attendance, $image);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAttendanceRequest $request
     * @return Application|ResponseFactory|Response
     */
    public function store(StoreAttendanceRequest $request)
    {
        $data = $request->validate([
            'lesson_id' => ['required',],
            'qr_id' => ['required',],
            'student_id' => ['required',],
            'b1' => ['required', 'image'],
//            'b1s' => ['required', 'string'],
            'b2' => ['required', 'image'],
//            'b2s' => ['required', 'string'],
            'b3' => ['required', 'image'],
//            'b3s' => ['required', 'string'],
            'f1' => ['required', 'image'],
//            'f1s' => ['required', 'string'],
            'f2' => ['required', 'image'],
//            'f2s' => ['required', 'string'],
        ]);

        $qr = Qr::findOrFail($data['qr_id']);
        $status = $qr->qr_status_id;
        $user = User::findOrFail(auth()->user()->getAuthIdentifier());

        $b1Path = request()->file('b1')->store('uploads', 'public');
        $b2Path = request()->file('b2')->store('uploads', 'public');
        $b3Path = request()->file('b3')->store('uploads', 'public');
        $f1Path = request()->file('f1')->store('uploads', 'public');
        $f2Path = request()->file('f2')->store('uploads', 'public');

        if ($status == 1) {
            $attendance = Attendance::create([
                'attendance_status_id' => 1,
                'qr_id' => $data['qr_id'],
                'lesson_id' => $data['lesson_id'],
                'student_id' => $data['student_id']
            ]);
            Image::create([
                'attendance_id' => $attendance->id,
                'path' => $b1Path,
            ]);
            Image::create([
                'attendance_id' => $attendance->id,
                'path' => $b2Path,
            ]);
            Image::create([
                'attendance_id' => $attendance->id,
                'path' => $b3Path,
            ]);
            Image::create([
                'attendance_id' => $attendance->id,
                'path' => $f1Path,
            ]);
            Image::create([
                'attendance_id' => $attendance->id,
                'path' => $f2Path,
            ]);
            return response(['message' => 'success']);
        } elseif ($status == 2) {
            return response(['message' => 'this code is on paused']);
        } elseif ($status == 3) {
            return response(['message' => 'this code is stopped']);
        }
        return response(['message' => 'fail']);
    }

    /**
     * Display the specified resource.
     *
     * @return Application|Factory|View
     */
    public function show(int $attendance_id)
    {
        $attendance = Attendance::find($attendance_id);
        $images = $attendance->images;
        return \view('atten/show', compact('attendance', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Attendance $attendance
     * @return Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateAttendanceRequest $request
     * @param Attendance $attendance
     * @return Response
     */
    public function update(UpdateAttendanceRequest $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Attendance $attendance
     * @return Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }

    /*
     *
     */

    private function countAttendanceStatus(int $b1, int $b2, int $b3, int $f1, int $f2)
    {
//        $a = ($b1 + $b2 + $b3 + $f1 + $f2);
//        $b = $a / 5;
//        if ($b >= $a * 0.6 ) {
//
//        }
        return 3;
    }
}
