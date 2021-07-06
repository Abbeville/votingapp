<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;

class ProfileController extends Controller
{
    public function index(){
    	$user = Auth::user();
    	return view('pages.user.profile', compact('user'));
    }

    public function update(Request $request){
        // dd($request->all());
    	$request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'exists:users'],
            'phone_number' => ['required', 'numeric'],
            'gender' => ['required'],
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $avatarName = '_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        // $request->avatar->storeAs('avatars', $avatarName);
        $avatar = $request->avatar;

        $avatar->move('uploads', $avatarName);

    	$user = Auth::user();

        $user->phone_number = $request->phone_number;

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->gender = $request->gender;

        $user->email = $request->email;
        $user->avatar_url = $avatarName;

        $user->save();

        Session::flash('success', 'Profile updated successfully!');

        return redirect()->route('user.profile');
    }
}
