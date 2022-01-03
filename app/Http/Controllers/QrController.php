<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Lesson;
use App\Models\Qr;
use App\Http\Requests\StoreQrRequest;
use App\Http\Requests\UpdateQrRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrController extends Controller
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
    public function index(int $lesson_id)
    {

        return view('qrcode');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        $data = request()->validate([
            'lesson_id' => 'required'
        ]);
        $lesson_id = $data['lesson_id'];
        $lesson = Lesson::findOrFail($lesson_id);
        $qr = Qr::create([
            'lesson_id' => $lesson_id,
        ]);
        $response = [
            'qr' => $qr->id
        ];
//        QrCode::size(400)->generate('https://127.0.0.1:8000/attendance/' . $lesson->id . '/' . $qr->id . '/');
        return \response($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreQrRequest $request
     * @return string
     */
    public function store(StoreQrRequest $request, int $student_id, int $lesson_id, int $qr_id)
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
     * @param Qr $qr
     * @return Response
     */
    public function show(Qr $qr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $qr_id
     * @return Response
     */
    public function edit(int $qr_id): Response
    {
        //
        return \response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateQrRequest $request
     * @return Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function update(UpdateQrRequest $request)
    {
        $data = $request->validate([
            'qr_id' => 'required'
        ]);
        $qr_id = $data['qr_id'];
        $qr = Qr::findOrFail($qr_id);
        $qr->qr_status_id = 3;
        $qr->save();
        return \response([]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Qr $qr
     * @return Response
     */
    public function destroy(Qr $qr)
    {
        //
    }
}
