<?php

namespace App\Http\Controllers;

use App\Imports\CourseStudentsImport;
use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Student;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public
    function create(): Response
    {
        $data = request()->validate([
            'option' => ['required'],
            'course_id' => ['required']
        ]);
        $course = Course::findOrFail($data['course_id']);
        $student_pivot = $course->students;
        if ($data['option'] == 1) {
            $data = request()->validate([
                'xlsx' => ['required', 'file'],
            ]);
            $file = $data['xlsx']->store('public/uploads/excels');
            $data = Excel::toCollection(new CourseStudentsImport($course), $file);
            foreach ($data[0] as $row) {
                if (!$student_pivot->contains($row['id'])) {
                    $course->students()->attach($row['id']);
                }
            }
            return \response(["Created"], 201);
        } else if ($data['option'] == 2) {
            $data = request()->validate([
                'json' => ['required'],
            ]);
        } else if ($data['option'] == 3) {
            $data = request()->validate([
                'student_id' => ['required'],
            ]);
            $student = Student::findOrFail($data['student_id']);
            $course->students()->attach($student);
            return \response([]);
        }
        return \response(['fail'], 400);
    }

    private function postUploadCsv()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreCourseRequest $request
     * @return Response
     */
    public
    function store(StoreCourseRequest $request)
    {
        $data = request()->validate([
            'name' => ['required'],
            'lecturer' => ['required'],
        ]);
        return response([
            Course::create([
                'course_list_id' => $data['name'],
                'admin_id' => auth()->user()->getAuthIdentifier(),
                'teacher_id' => $data['lecturer'],
                'active' => true
            ]),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @return Response
     */
    public function show(): Response
    {
        $user = auth()->user();
        $student = Student::findOrFail($user->id);
        $response = [];
        $courses = $student->courses->where('active', '=', 1);
        foreach ($courses as $course) {
            $course->setAttribute('teacher_name', (new User)->findOrFail($course->teacher_id)->name);
            $course->setAttribute('course_name', $course->courseList->name);
            $response[] = $course;
        }
        return \response([
            'courses' => $response,
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @return Response
     */
    public function showHistory(): Response
    {
        $user = auth()->user();
        $student = Student::findOrFail($user->id);
        $response = [];
        $courses = $student->courses->where('active', '=', 0);
        foreach ($courses as $course) {
            $course->setAttribute('teacher_name', (new User)->findOrFail($course->teacher_id)->name);
            $course->setAttribute('course_name', $course->courseList->name);
            $response[] = $course;
        }
        return \response([
            'courses' => $response,
            'status' => 'success'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Course $course
     * @return Response
     */
    public
    function edit(Course $course)
    {
        $data = request()->validate([
            'id' => ['required'],
            'teacher_id' => ['required'],
            'status' => ['required'],
        ]);
        $course = Course::findOrFail($data['id']);
        $course->teacher_id = $data['teacher_id'];
        $course->active = $data['status'];
        return response($course->save());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCourseRequest $request
     * @param Course $course
     * @return Response
     */
    public
    function update(UpdateCourseRequest $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     */
    public
    function destroy(): Response
    {
        $data = request()->validate([
            'id' => ['required'],
        ]);
        $course = Course::find($data['id']);
        $course->students()->detach();
        $course->lessons()->delete();
        return response($course->delete());
    }

    /**
     *
     * @return Response
     */
    public
    function remove(): Response
    {
        $data = request()->validate([
            'course_id' => ['required'],
            'student_id' => ['required'],
        ]);
        $course = Course::find($data['course_id']);
        $students = $course->students;

        foreach ($students as $student) {
            if ($student->id == $data['student_id']) {
                $course->students()->detach($student->id);
            }
        }
        return response([
            "Delete success"
        ]);
    }


}
