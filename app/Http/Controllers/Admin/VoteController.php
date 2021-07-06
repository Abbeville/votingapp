<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Vote;
use App\Models\Contestant;

class VoteController extends Controller
{
    public function index()
    {
    	$contestants = Contestant::all()
                                ->groupBy('contest_id')
                                ->keyBy(function($item){
                                        return $item[0]->contest->title;
                                    });
        $votes = Vote::all();

    	return view('pages.admin.votes.vote.index', compact('contestants', 'votes'));
    }

    public function winners()
    {
    	return view('pages.admin.votes.vote.winner');
    }

    public function start()
    {
    	//Start vote
    }

    public function end()
    {
    	//end vote.
    }
}
