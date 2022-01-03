<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $user = (new User)->find(auth()->user()->getAuthIdentifier());
        $user_type = $user->user_type_id;
        if ($user_type === 1) {
            return view('home/student');
        } elseif ($user_type === 2) {
            return view('home/teacher');
        } elseif ($user_type === 3) {
            return view('home/admin');
        }
        return view('home/home');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return response(['message' => 'success']);
    }
}
