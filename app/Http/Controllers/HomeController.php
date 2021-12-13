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
        $user = User::find(auth()->user()->getAuthIdentifier());
        if ($user->userType->id = 1) {
            return view('home/student');
        } elseif ($user->userType->id = 2) {
            return view('home/teacher');
        } elseif ($user->userType->id = 3) {
            return view('home/admin');
        }
        return view('home');
    }
}
