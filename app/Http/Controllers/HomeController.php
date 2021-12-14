<?php

namespace App\Http\Controllers;

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
        dd(Lesson::find($user->teacher), $user->teacher);

        if ($user->user_type_id === 1) {
            return view('home/student', compact('user'));
        } elseif ($user->user_type_id === 2) {
            return view('home/teacher', compact('user'));
        } elseif ($user->user_type_id === 3) {
            return view('home/admin', compact('user'));
        }
        return view('home/home');
    }
}
