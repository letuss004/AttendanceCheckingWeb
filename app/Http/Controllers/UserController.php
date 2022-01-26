<?php

namespace App\Http\Controllers;

use App\Imports\CourseStudentsImport;
use App\Imports\StudentsImport;
use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Testing\Fluent\Concerns\Has;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $data = $request->validate([
            'option' => ['required'],
            'course_id' => ['required'],
        ]);
        if ($data['option'] == 1) {
            $data = request()->validate([
                'xlsx' => ['required', 'file'],
            ]);
            $file = $data['xlsx']->store('public/uploads/excels');
            $data = Excel::toCollection(new StudentsImport, $file);
            foreach ($data[0] as $row) {

//                User::createWithRel(
//                    [
//                        'id' => $row['id'],
//                        'email'=>$row['email'],
//                        'username'=>$row['id'],
//                        'name'=>$row['name'],
//                        'password'=>\Hash::make()
//                    ]
//                );
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
            return \response([]);
        }
        return \response(['fail'], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param \App\Models\User $user
     * @return Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return Response
     */
    public function destroy(User $user)
    {
        //
    }
}
