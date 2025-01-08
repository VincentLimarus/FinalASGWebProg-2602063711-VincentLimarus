<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\AvatarModel as Avatar;
use App\Models\TransactionModel as Transaction;
use App\Models\User;
use App\Models\FriendModel;
use Illuminate\Support\Facades\DB;

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

        $avatarsOwned = Transaction::where('user_id', $user->id)->get();

        return view('user.shop', ['user' => $user, 'avatars' => $avatars, 'avatarsOwned' => $avatarsOwned]);
    }

    public function searchUsers(Request $request)
    {
        $query = User::query();

        if ($request->has('gender') && $request->gender != 1) {
            if ($request->gender == 2) {
                $query->where('gender', 'Male');
            } elseif ($request->gender == 3) {
                $query->where('gender', 'Female'); 
            }
        }

        if ($request->has('profession') && $request->profession != '') {
            $query->where('profession', 'like', '%' . $request->profession . '%');
        }

        $users = $query->get();

        return view('home', ['users' => $users]);
    }

    public function requestAddFriend(Request $req)
    {
        $user = Auth::user(); 
        $friend = User::find($req->id); 
        
        if (!$friend) {
            return redirect()->route('home')->with('error', 'User not found!');
        }

        $checkUser = FriendModel::where('user_id', $user->id)
            ->where('friend_id', $friend->id)
            ->first();

        if ($checkUser) {
            if ($checkUser->is_active == 0) {
                return redirect()->route('home')->with('error', 'Friend request already sent!');
            } else {
                return redirect()->route('home')->with('error', 'This user is already your friend!');
            }
        }

        FriendModel::create([
            'user_id' => $user->id,   
            'friend_id' => $friend->id,
            'is_active' => 0,          
        ]);

        return redirect()->route('home')->with('success', 'Friend request sent successfully!');
    }

    public function viewFriends(Request $req)
    {
        $user = Auth::user();

        $activeFriends = FriendModel::where(function ($query) use ($user) {
            $query->where('user_id', $user->id)
                ->orWhere('friend_id', $user->id);
        })->where('friends.is_active', 1)
        ->join('users', function ($join) use ($user) {
            $join->on('users.id', '=', DB::raw('CASE WHEN friends.user_id = ' . $user->id . ' THEN friends.friend_id ELSE friends.user_id END'));
        })
        ->select('friends.*', 'users.name', 'users.profile_picture', 'users.profession', 'users.gender')
        ->get();

        $pendingFriends = FriendModel::where('user_id', $user->id)
            ->where('friends.is_active', 0)
            ->join('users', 'users.id', '=', 'friends.friend_id')
            ->select('friends.*', 'users.name', 'users.profile_picture', 'users.profession', 'users.gender')
            ->get();

        $friendRequestFromOtherUser = FriendModel::where('friend_id', $user->id)
            ->where('friends.is_active', 0)
            ->join('users', 'users.id', '=', 'friends.user_id') // Change join to user_id
            ->select('friends.*', 'users.name', 'users.profile_picture', 'users.profession', 'users.gender')
            ->get();

        return view('user.friends', [
            'user' => $user,
            'pendingFriends' => $pendingFriends,
            'activeFriends' => $activeFriends,
            'friendRequestFromOtherUser' => $friendRequestFromOtherUser
        ]);
    }


    public function deleteFriend(Request $req)
    {
        $userId = Auth::user()->id;
        $friendId = $req->id;

        $delete = FriendModel::where(function ($query) use ($userId, $friendId) {
            $query->where('user_id', $userId)->where('friend_id', $friendId)
                ->orWhere('user_id', $friendId)->where('friend_id', $userId);
        })->where('is_active', 1)->delete();

        if (!$delete) {
            return redirect()->route('user.friends')->with('error', 'Friend not found or already deleted!');
        }

        return redirect()->route('user.friends')->with('success', 'Friend deleted successfully!');
    }


    public function deleteRequest(Request $req)
    {
        $userId = Auth::user()->id;
        $friendId = $req->id;

        $delete = FriendModel::where('user_id', $userId)
            ->where('friend_id', $friendId)
            ->where('is_active', 0)
            ->delete();

        if (!$delete) {
            return redirect()->route('user.friends')->with('error', 'Friend request not found!');
        }

        return redirect()->route('user.friends')->with('success', 'Friend request deleted successfully!');
    }

    public function deleteRequestFromUser(Request $req)
    {
        $userId = $req->id;
        $friendId = Auth::user()->id;

        $delete = FriendModel::where('user_id', $userId)
            ->where('friend_id', $friendId)
            ->where('is_active', 0)
            ->delete();

        if (!$delete) {
            return redirect()->route('user.friends')->with('error', 'Friend request not found!');
        }

        return redirect()->route('user.friends')->with('success', 'Friend request deleted successfully!');
    }

    public function acceptRequest(Request $req)
    {
        $userId = $req->id;
        $friendId = Auth::user()->id;

        $accept = FriendModel::where('user_id', $userId)
            ->where('friend_id', $friendId)
            ->where('is_active', 0)
            ->update(['is_active' => 1]);

        if (!$accept) {
            return redirect()->route('user.friends')->with('error', 'Friend request not found!');
        }

        return redirect()->route('user.friends')->with('success', 'Friend request accepted successfully!');
    }
}
