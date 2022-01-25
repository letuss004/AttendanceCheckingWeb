<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Teacher;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'id' => ['required', 'string', 'max:255', 'unique:users'],
            'department_id' => ['required', 'int', 'max:255'],
            'user_type_id' => ['required', 'int', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return User
     */
    protected function create(array $data): User
    {
        $user = (new User)->create([
            'id' => $data['id'],
            'email' => $data['email'],
            'username' => $data['email'],
            'user_type_id' => $data['user_type_id'],
            'name' => $data['name'],
            'department_id' => $data['department_id'],
            'password' => Hash::make($data['password']),
        ]);
        $user->createToken('remember_token')->accessToken;
        if ($data['user_type_id'] == 1) {
            Student::create([
                'id' => $data['id']
            ]);
        } elseif ($data['user_type_id'] == 2) {
            Teacher::create([
                'id' => $data['id']
            ]);
        } elseif ($data['user_type_id'] == 3) {
            Admin::create([
                'id' => $data['id']
            ]);
        }
        return $user;
    }
}
