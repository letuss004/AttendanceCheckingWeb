<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Lesson;
use App\Models\Qr;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CourseController extends Controller
{
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
//            dd($user, $user->status);
        }

        return view('courses/attendances', compact('users', 'lessons'));
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
     *
     * @return \Illuminate\Http\Response
     */
    public
    function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreCourseRequest $request
     * @return \Illuminate\Http\Response
     */
    public
    function store(StoreCourseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public
    function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public
    function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCourseRequest $request
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public
    function update(UpdateCourseRequest $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(Course $course)
    {
        //
    }
}
