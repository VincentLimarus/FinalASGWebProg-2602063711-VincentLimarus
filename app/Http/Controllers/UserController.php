<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\AvatarModel as Avatar;

class UserController extends Controller
{
    public function register(){
        return redirect()->route('payment.form');
    }

    public function login(Request $req){
        $validate = $req->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
    }

    public function showRegisterForm(){
        return view('auth.register');
    }

    public function showPaymentForm(){
        return view('user.payment-page');
    }
    
    public function processPayment(Request $req){

        if($req->coins < 0){
            return redirect()->back()->with('error', 'Please re-enter amount!');
        }

        $user = Auth::user();

        $user->update([
            'coins' => 100 + $req->coins,
        ]);

        return redirect()->route('login')->with('success', 'Payment confirmed successfully!');
    }

    public function viewChangeVisible(){
        $user = Auth::user();

        return view('user.visibleSetting', ['user' => $user]);
    }

    public function purchaseVisibility(){
        $user = Auth::user();

        if($user->coins > 50 && $user->is_active == 1){
            $user->coins -= 50;
        } else {
            return redirect()->route('home')->with('error', 'Insufficient coins!');
        }
        $user->is_active = 0;

        $randomInt = random_int(1,3);
        $user->profile_picture = 'assets/bear'.$randomInt.'.jpg';
        $user->save();

        return redirect()->route('home')->with('success', 'Visibility purchased successfully!');
    }

    public function deactivateVisiblity(){
        $user = Auth::user();

        if($user->coins > 5 && $user->is_active == 0){
            $user->coins -= 5;
        } else {
            return redirect()->route('home')->with('error', 'Insufficient coins!');
        }

        $user->is_active = 1;
        $user->profile_picture = 'assets/default.jpg';
        $user->save();

        return redirect()->route('home')->with('success', 'Visibility deactivated successfully!');
    }

    public function viewShop(){
        $user = Auth::user();
        $avatars = Avatar::all();

        return view('user.shop', ['user' => $user, 'avatars' => $avatars]);
    }
}
