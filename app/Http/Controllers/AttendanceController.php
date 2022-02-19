<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Qr;
use App\Models\Student;
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
    public function index(int $course_id): Factory|View|Application
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
                $attendanceStatus[] = $status;
            }
            $users[] = $user->setAttribute('status', $attendanceStatus);
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
     * @param Request $request
     * @return void
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
    public function store(StoreAttendanceRequest $request): Response|Application|ResponseFactory
    {
        $data = $request->validate([
            'lesson_id' => ['required',],
            'qr_id' => ['required',],
            'student_id' => ['required',],
            'b1' => ['required', 'image'],
            'b2' => ['required', 'image'],
            'b3' => ['required', 'image'],
            'f1' => ['required', 'image'],
            'f2' => ['required', 'image'],
        ]);

        $qr = Qr::findOrFail($data['qr_id']);
        $status = $qr->qr_status_id;
        $user = (new User)->findOrFail(auth()->user()->getAuthIdentifier());
        if ($qr->attendances->contains('student_id', '=', $user->id)) {
            return response(['message' => 'Student already attendance'], 403);
        }

        $b1Path = request()->file('b1')->store('uploads/images', 'public');
        $b2Path = request()->file('b2')->store('uploads/images', 'public');
        $b3Path = request()->file('b3')->store('uploads/images', 'public');
        $f1Path = request()->file('f1')->store('uploads/images', 'public');
        $f2Path = request()->file('f2')->store('uploads/images', 'public');


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
            return response(['message' => 'success'], 201);
        } elseif ($status == 2) {
            return response(['message' => 'this code is on paused'], 403);
        } elseif ($status == 3) {
            return response(['message' => 'this code is stopped'], 430);
        }
        return response(['message' => 'fail'], 430);
    }

    /**
     * Display the specified resource.
     *
     * @param int $attendance_id
     * @return Application|Factory|View
     */
    public function show(int    $attendance_id,
                         int    $qr_id,
                         string $student_id): View|Factory|Application
    {
        $qr = Qr::find($qr_id);
        $user = (new User)->findOrFail($student_id);
        $attendance = Attendance::find($attendance_id);
        $images = $attendance->images;
        return \view('atten/show', compact('attendance', 'images', 'qr', 'user'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $qr_id
     * @return Application|Factory|View
     */
    public function showNotAtten(int    $qr_id,
                                 string $student_id): View|Factory|Application
    {
        $qr = Qr::find($qr_id);
        $user = (new User)->findOrFail($student_id);
        return \view('atten/notshow', compact('qr', 'user'));
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
        $data = $request->validate([
            'user_id' => 'required',
            'qr_id' => 'required',
            'type' => ['int', 'required']
        ]);
        $qr = Qr::findOrFail($data['qr_id']);
        $ls_id = $qr->lesson->id;
        // type = 1 => not atten to atten
        if ($data['type'] == 1) {
            $qr->attendances()->create([
                'attendance_status_id' => 1,
                'qr_id' => $qr->id,
                'lesson_id' => $qr->lesson->id,
                'student_id' => $data['user_id']
            ]);
            return \response(['lesson_id' => $ls_id]);
        } else {
            $atten = $qr->attendances;
            foreach ($atten as $item) {
                if ($item->student_id == $data['user_id']) {
                    $item->images()->delete();
                    $item->delete();
                }
            }
            return \response(['lesson_id' => $ls_id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Attendance $attendance
     * @return Response
     */
    public function destroy(Attendance $attendance)
    {
        return \response([]);
    }

    /*
     *
     */
    /**
     * @return Application|ResponseFactory|Response
     */
    public function test()
    {
        return \response([]);
    }

    public function fetch()
    {
        $data = \request()->validate([
            'course_id' => ['required'],
            'student_id' => ['required'],
        ]);
        $course = Course::findOrFail($data['course_id']);
        $student = (new User)->findOrFail($data['student_id']);
        $lessons = $course->lessons;
        $status = [];
        foreach ($lessons as $lesson) {
            $cond = $this->attendanceCondition($student, $lesson);
            $status[] = $cond;
        }
        return \response([
            'lessons' => $lessons,
            'status' => $status,
            'message' => 'success'
        ]);
    }

}
