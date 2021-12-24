<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\Qr;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAttendanceRequest $request
     * @return string
     */
    public function store(StoreAttendanceRequest $request, int $lesson_id, int $qr_id, string $student_id)
    {
        $request->validate([
            // do st here
        ]);
        $qr = Qr::findOrFail($qr_id);
        $status = $qr->qr_status_id;
        if ($status == 1) {
            Attendance::create([
                'attendance_status_id' => 1,
                'qr_id' => $qr_id,
                'lesson_id' => $lesson_id,
                'student_id' => $student_id
            ]);
            return 'success';
        } elseif ($status == 2) {
            return 'this code is on paused';
        } elseif ($status == 3) {
            return 'this code is stopped';
        }
        return 'fail';
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Attendance $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Attendance $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateAttendanceRequest $request
     * @param \App\Models\Attendance $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttendanceRequest $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Attendance $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
