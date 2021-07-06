<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contestant;
use App\Models\User;
use App\Models\Contest;

class ContestantController extends Controller
{
    public function index()
    {

    	$contestants = Contestant::all()
                                ->groupBy('contest_id')
                                ->keyBy(function($item){
                                        return $item[0]->contest->title;
                                    });
    	
    	return view('pages.admin.votes.contestant.index', compact('contestants'));
    }

    public function create()
    {
        $users = User::all();

        $contests = Contest::all();

    	return view('pages.admin.votes.contestant.create', compact('users', 'contests'));
    }

    public function show(Contestant $contestant)
    {
    	return view('pages.admin.votes.contestant.show', compact('contestant'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'user_id' => 'required',
            'contest_id' => 'required'
        ]);

        $contest_id = $request->contest_id;
        $user_id = $request->user_id;

        //Check if user contestant exist
        $check = Contestant::where([
                                    ['contest_id', '=', $contest_id],
                                    ['user_id', '=', $user_id]
                                ])
                                ->count();
        if ($check > 0) {
           session()->flash('error', 'The selected Student is already a contestant for the selected Contest');

           return redirect()->back();                         # code...
        }          

    	$contestant = new Contestant();


    	$contestant->user_id = $user_id;
        $contestant->contest_id = $contest_id;
        
    	$contestant->save();

    	session()->flash('success', 'Contestant Added Successfully');

    	return redirect()->back();
    }

    public function delete(Contestant $contestant)
    {
    	$contestant->delete();

    	session()->flash('success', 'Item Deleted');

    	return redirect()->back();
    }
}
