<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\WorkModel;

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
    protected $redirectTo = '/payment-form';

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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string',
            'gender' => 'required|string|in:Male,Female',
            'works' => 'required|array|min:3',
            'works.*' => 'required|string',
            'linkedin' => 'required|string|regex:/^https:\/\/www\.linkedin\.com\/in\/[a-zA-Z0-9_-]+$/',
            'mobile_number' => 'required|digits_between:10,15|unique:users',
            'email' => 'required|email|unique:users',
            'password'=> 'required|string|min:6',
            'confirm_password' => 'required|same:password',
            'registration_price' => 'required|numeric|between:100000,125000',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'gender' => $data['gender'],
            'linkedin' => $data['linkedin'],
            'mobile_number' => $data['mobile_number'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'registration_price' => $data['registration_price'],
            'profile_picture' => 'assets/default.jpg',
        ]);

        foreach ($data['works'] as $work) {
            WorkModel::create([
                'name' => $work,
                'user_id' => $user->id,
            ]);
        }
        return $user;
    }
}
