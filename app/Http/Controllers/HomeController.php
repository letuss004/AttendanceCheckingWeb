<?php

namespace App\Http\Controllers;

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
        $user = auth()->user();
        if ($user->userType->id == 1) {
            return view('home/student', $user);
        } elseif ($user->userType->id == 2) {
            return view('home/teacher', $user);
        } elseif ($user->userType->id == 3) {
            return view('home/admin', $user);
        }
        return view('home');
    }
}
