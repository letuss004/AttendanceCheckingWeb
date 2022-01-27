<?php

namespace App\Http\Controllers;

use App\Imports\CourseStudentsImport;
use App\Imports\StudentsImport;
use App\Models\Attendance;
use App\Models\Course;
use App\Models\Department;
use App\Models\Enrollment;
use App\Models\Lesson;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Temporary;
use App\Models\User;
use Exception;
use Hash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;
use Illuminate\Testing\Fluent\Concerns\Has;
use Maatwebsite\Excel\Facades\Excel;
use Request;

class StudentController extends Controller
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
    public function index(): View|Factory|Application
    {
        $users = User::all()->where('user_type_id', '=', 1);
        return view('/admin/students/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws Exception
     */
    public function create(): Response
    {
        $data = request()->validate([
            'option' => ['required'],
        ]);
        $users = User::all();
        $dep_list = Department::all();
        if ($data['option'] == 1) {
            $data = request()->validate([
                'xlsx' => ['required', 'file'],
            ]);
            $file = $data['xlsx']->store('public/uploads/excels');
            $data = Excel::toCollection(new StudentsImport, $file);
            foreach ($data[0] as $row) {
                $pw = random_int(10000000, 11111111) * 9;
                if ($row['major'] != null and !$users->contains('id', '=', $row['id'])) {
                    $dep = $this->getDepartment($row['major'], $dep_list);
                    Student::createWithRel([
                        'id' => $row['id'],
                        'email' => $row['email'],
                        'username' => $row['id'],
                        'user_type_id' => 1,
                        'name' => $row['last'] . ' ' . $row['first'],
                        'password' => $pw,
                        'department_id' => $dep,
                    ]);
                }
            }
            return \response(["Created"], 201);
        } else if ($data['option'] == 2) {
            $data = request()->validate([
                'json' => ['required'],
            ]);
        } else if ($data['option'] == 3) {
            return \response([]);
        }
        return \response(['fail'], 400);
    }

    /**
     * @param string $department
     * @param Collection $list
     * @return int
     */
    public function getDepartment(string $department, Collection $list): int
    {
        return $list->where('department', '=', $department)->first()->id;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStudentRequest $request
     * @param int $lesson_id
     * @return string
     */
    public function store(StoreStudentRequest $request, int $lesson_id): string
    {
        $lesson = Lesson::findOrFail($lesson_id);
        Attendance::create([
            'attendance_status_id' => 1,
            'lesson_id' => $lesson_id,
            'student_id' => 'BA9067',
        ]);
        return "success";
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Student $student
     * @return Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Student $student
     * @return Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateStudentRequest $request
     * @param \App\Models\Student $student
     * @return Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Student $student
     * @return Response
     */
    public function destroy(Student $student)
    {
        //
    }

}
