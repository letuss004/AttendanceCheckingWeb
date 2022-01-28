<?php

namespace App\Http\Controllers;

use App\Imports\StudentsImport;
use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Department;
use App\Models\Student;
use App\Models\User;
use App\Utilities\Utils;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
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
        $users = User::all()->where('user_type_id', '=', 3);
        return view('/admin/index', compact('users'));
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
            $data = Excel::toCollection(new StudentsImport, $file);
            foreach ($data[0] as $row) {
                $pw = random_int(10000000, 11111111) * random_int(1, 9);
                if ($row['major'] != null) {
                    $dep = Utils::getDepartment($row['major'], $dep_list);
                    Admin::createWithRel([
                        'id' => $row['id'],
                        'email' => $row['email'],
                        'username' => $row['id'],
                        'user_type_id' => 3,
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
     * @param \App\Http\Requests\StoreAdminRequest $request
     * @return Response
     */
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Admin $admin
     * @return Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Admin $admin
     * @return Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateAdminRequest $request
     * @param \App\Models\Admin $admin
     * @return Response
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Admin $admin
     * @return Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
