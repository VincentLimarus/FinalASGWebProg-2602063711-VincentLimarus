<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\TransactionModel as Transaction;
use App\Models\AvatarModel as Avatar;

class AvatarController extends Controller
{
    public function buyAvatar(Request $req){
        $user = Auth::user();
        $avatar = Avatar::find($req->id); 
        $price = $avatar->price;
        $tr = Transaction::all();

        if($tr->count() != 0){
            foreach($tr as $t){
                if($t->user_id == $user->id && $t->avatar_id == $avatar->id){
                    return redirect()->route('view-shop')->with('error', 'You already have this avatar!');
                }
            }
        }

        if($user->coins > $price){
            $user->coins -= $price;

            Transaction::Create([
                'user_id' => $user->id,
                'avatar_id' => $avatar->id,
            ]);
            $user->save();
            return redirect()->route('view-shop')->with('success', 'Avatar purchased successfully!');
        }
        else{
            return redirect()->route('view-shop')->with('error', 'Insufficient coins!');
        }
    }

    public function equipAvatar(Request $req){
        $user = Auth::user();
        $avatar = Avatar::find($req->id);   

        $user->profile_picture = $avatar->profile_url;
        $user->save();
        return redirect()->route('view-shop')->with('success', 'Avatar equipped successfully!');
    }
}
