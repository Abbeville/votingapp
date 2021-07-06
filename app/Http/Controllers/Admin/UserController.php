<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;

class UserController extends Controller
{
    public function index(){
    	$users = User::role('student')->with('level')->get();

    	return view('pages.admin.users.index', compact('users'));
    }

    public function create()
    {

        $levels = DB::table('levels')->get();
        $departments = DB::table('departments')->get();
        return view('pages.admin.users.create', compact('levels', 'departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'matric' => ['required', 'string', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'numeric'],
            'level_id' => ['required'],
            'department_id' => ['required'],
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $avatarName = '_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        // $request->avatar->storeAs('avatars', $avatarName);
        $avatar = $request->avatar;

        $avatar->move('uploads', $avatarName);

        $user =  User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'matric' => $request->matric,
            'phone_number' => $request->phone_number,
            'level_id' => $request->level_id,
            'department_id' => $request->department_id,
            'password' => Hash::make($request->lastname),
            'avatar_url' => $avatarName
        ]);

        $user->assignRole('student');

        session()->flash('success', 'New data entry');

        return redirect()->route('admin.users.index');
    }

    public function paid(){
    	$users = User::with('level')->whereNotNull('payment_status')->get();

    	return view('dashboard.user.paid', compact('users'));
    }

    /*public function verified(){
    	$users = User::with('level')->whereNotNull('avatar')->get();

    	return view('dashboard.user.verified', compact('users'));
    }*/

    public function verification(){
        return view('pages.admin.verify');
    }

    public function verify(Request $request){
        $username = $request->username;
        $user = User::where('username', $username)->first();
        
        if($user->payment_status){
            Session::flash('success', "This Student has Paid");
            return view('dashboard.payment-status', compact('user'));
        }else{
            Session::flash('error', "Yet to pay Due");
            return redirect()->back();
        }
    }
}
