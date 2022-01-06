<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Lesson;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Models\Qr;
use App\Models\Student;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Request;

class LessonController extends Controller
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
        $students = $course->students;
        $users = [];
        foreach ($students as $student) {
            array_push($users, (new User)->findOrFail($student->id));
        }
        $student_count = count($students);
        return view('lessons/index', compact('course', 'student_count', 'students', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(int $course_id)
    {
        return view('lessons/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLessonRequest $request
     * @return string
     */
    public function store(StoreLessonRequest $request)
    {
        $data = request()->validate([
            'name' => ['required'],
            'course_id' => ['required'],
        ]);
        Lesson::create([
            'name' => $data['name'],
            'course_id' => $data['course_id'],
        ]);
        return \response([]);
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(int $lesson_id)
    {
        $lesson = Lesson::findOrFail($lesson_id);
        $students = $lesson->course->students;
        $users = [];
        foreach ($students as $student) {
            $user = User::findOrFail($student->id);
            $status = $this->attendanceCondition($user, $lesson);
            $user->setAttribute('status', $status);
            array_push($users, $user);
        }
        return view('lessons/show', compact('lesson', 'users'));
    }

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
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {

        return \response(request());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateLessonRequest $request
     * @param \App\Models\Lesson $lesson
     * @return Response
     */
    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        $data = $request->validate([
            'name' => 'required',
            'lesson_id' => 'required',
        ]);
        $lesson = Lesson::findOrFail($data['lesson_id']);
        $lesson->name = $data['name'];
        $lesson->save();
        return \response([]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Lesson $lesson
     * @return Response
     */
    public function destroy(Lesson $lesson): Response
    {
        $data = request()->validate([
            'lesson_id' => 'required',
        ]);
        $lesson = Lesson::findOrFail($data['lesson_id']);
        $lesson->delete();
        return \response([]);
    }
}
