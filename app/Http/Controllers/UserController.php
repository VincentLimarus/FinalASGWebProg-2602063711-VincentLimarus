<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserModel as User; 
use App\Models\WorkModel;

class UserController extends Controller
{
    public function register(Request $req){
        $req->validate([
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

        $user = User::create([
            'name' => $req['name'],
            'gender' => $req['gender'],
            'linkedin' => $req['linkedin'],
            'mobile_number' => $req['mobile_number'],
            'email' => $req['email'],
            'password' => bcrypt($req['password']),
            'registration_price' => $req['registration_price'],
        ]);

        foreach ($req['works'] as $work) {
            WorkModel::create([
                'name' => $work,
                'user_id' => $user->id,
            ]);
        }

        return redirect()->route('login');
    }
    public function showRegisterForm(){
        return view('auth.register');
    }
}
