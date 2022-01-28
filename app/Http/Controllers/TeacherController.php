<?php

namespace App\Http\Controllers;

use App\Imports\StudentsImport;
use App\Models\Admin;
use App\Models\Department;
use App\Models\Teacher;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\User;
use App\Utilities\Utils;
use Exception as ExceptionAlias;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;

class TeacherController extends Controller
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
        $users = User::all()->where('user_type_id', '=', 2);
        return view('/admin/teacher/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws ExceptionAlias
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
            $data = Excel::toCollection(new StudentsImport, $file);
            foreach ($data[0] as $row) {
                $pw = random_int(10000000, 11111111) * random_int(1, 9);
                if ($row['major'] != null) {
                    $dep = Utils::getDepartment($row['major'], $dep_list);
                    Teacher::createWithRel([
                        'id' => $row['id'],
                        'email' => $row['email'],
                        'username' => $row['id'],
                        'user_type_id' => 2,
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
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreTeacherRequest $request
     * @return Response
     */
    public function store(StoreTeacherRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Teacher $teacher
     * @return Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Teacher $teacher
     * @return Response
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateTeacherRequest $request
     * @param \App\Models\Teacher $teacher
     * @return Response
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Teacher $teacher
     * @return Response
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
