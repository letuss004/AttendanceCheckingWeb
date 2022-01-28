<?php

namespace App\Http\Controllers;

use App\Imports\StudentsImport;
use App\Models\Attendance;
use App\Models\Department;
use App\Models\Lesson;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;

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
        $dep_list = Department::all();
        if ($data['option'] == 1) {
            $data = request()->validate([
                'xlsx' => ['required', 'file'],
            ]);
            $file = $data['xlsx']->store('public/uploads/excels');
//            using student import
            $data = Excel::toCollection(new StudentsImport, $file);
            foreach ($data[0] as $row) {
                $pw = random_int(10000000, 11111111) * random_int(1, 9);
                if ($row['major'] != null) {
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
            return \response(['not support yet']);
        } else if ($data['option'] == 3) {
            return \response(['not support yet']);
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
     */
    public function store(StoreStudentRequest $request, int $lesson_id): Response|Application|ResponseFactory
    {
        return \response();
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
