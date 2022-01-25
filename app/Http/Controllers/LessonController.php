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
use Illuminate\Contracts\Routing\ResponseFactory;
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
        $tmp = false;
        $course = Course::findOrFail($course_id);
        $students = $course->students;
        $lessons = $course->lessons;
        $users = [];
        foreach ($lessons as $lesson) {
            $count = 0;
            foreach ($students as $student) {
                $user = User::findOrFail($student->id);
                if ($this->attendanceCondition($user, $lesson) == 1) {
                    $count++;
                }
                if (!$tmp) {
                    array_push($users, $user);
                }
            }
            $tmp = true;
            $lesson->setAttribute('count', $count);
        }
        if (count($lessons) == 0) {
            foreach ($students as $student) {
                $user = User::findOrFail($student->id);
                array_push($users, $user);
            }
        }
        if (user::findorfail(auth()->user()->getauthidentifier())->user_type_id == 3) {
            if (count($lessons) == 0) {
                foreach ($students as $student) {
                    $user = User::findOrFail($student->id);
                    array_push($users, $user);
                }
            }
            return \view('admin/lessons/index', compact('course', "lessons", 'students', 'users'));
        }
        return view('lessons/index', compact('course', "lessons", 'students', 'users'));
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
     * @return Application|ResponseFactory|Response
     */
    public function store(StoreLessonRequest $request)
    {
        $data = request()->validate([
            'name' => ['required'],
            'course_id' => ['required'],
        ]);
        return \response(
            Lesson::create([
                'name' => $data['name'],
                'course_id' => $data['course_id'],
            ])
        );
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
        if (User::findOrFail(auth()->user()->getAuthIdentifier())->department_id == 1) {
            $st_all = Student::all();
            return view('admin/lessons/show',
                compact('lesson',
                    'users',
                    'st_all'
                )
            );
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
     * @return Application
     */
    public function edit(int $id): Application
    {

        return \response(request());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLessonRequest $request
     * @param Lesson $lesson
     * @return Response
     */
    public function update(UpdateLessonRequest $request, Lesson $lesson): Response
    {
        $data = $request->validate([
            'name' => 'required',
            'lesson_id' => 'required',
        ]);
        $lesson = Lesson::findOrFail($data['lesson_id']);
        $lesson->name = $data['name'];
        return \response($lesson->save());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Lesson $lesson
     * @return Response
     */
    public function destroy(Lesson $lesson): Response
    {
        $data = request()->validate([
            'lesson_id' => 'required',
        ]);
        $lesson = Lesson::findOrFail($data['lesson_id']);
        return \response($lesson->delete());
    }
}
