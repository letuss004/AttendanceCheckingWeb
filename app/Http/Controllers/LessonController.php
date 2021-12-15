<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CoursesRegistration;
use App\Models\Lesson;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
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
        $student_count = count(CoursesRegistration::findMany($course));
        return view('lessons/index', compact('course', 'student_count'));
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
        return redirect('/lessons/' . $data['course_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Lesson $lesson
     * @return Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        return \view('lessons/edit', compact('id'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Lesson $lesson
     * @return Response
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}
