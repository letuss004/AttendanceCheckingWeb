<?php

namespace App\Http\Controllers;

use App\Imports\CourseStudentsImport;
use App\Imports\StudentImport;
use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Lesson;
use App\Models\Qr;
use App\Models\Student;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;

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
            'course_id' => ['required'],
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
            $student = Student::find($data['student_id']);
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
     * @param \App\Models\Course $course
     * @return Response
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
     * @param \App\Models\Course $course
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
}
