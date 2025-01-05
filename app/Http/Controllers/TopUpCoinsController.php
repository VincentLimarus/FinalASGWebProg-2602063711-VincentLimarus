<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TopUpCoinsController extends Controller
{
    public function showTopUpPages(){
        $user = User::all();

        return view('user.topupcoins', ['user' => $user]);
    }
    
    public function topUpCoins(Request $req)
    {
        $user = Auth::user();
        
        $req->validate([
            'coins' => 'required|integer|min:1',
        ]);

        $user->coins += $req->coins;
        $user->save();

        return redirect()->route('home')->with('success', 'Coins successfully topped up!');
    }
}
