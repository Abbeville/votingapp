<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contestant;
use App\Models\Contest;
use App\Models\User;
use App\Models\Vote;
use DB;

class VoteController extends Controller
{
    public function index()
    {

		$contestants = Contestant::all()
	                            ->groupBy('contest_id')
	                            ->keyBy(function($item){
	                                    return $item[0]->contest->title;
	                                });

	    $setting = DB::table('settings')->get()
                    ->keyBy('key')
                    ->transform(function ($setting) {
                        return $setting->value;
                    })->toArray();

    	return view('pages.user.votes.index', compact('contestants', 'setting'));
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'contestant_id' => 'required',
    		'voter_id' => 'required',
    		'contest_id' => 'required',
    	]);

    	$contest = Contest::find($request->contest_id);
    	$newContestant = Contestant::find($request->contestant_id);
    	$voter = User::find($request->voter_id);

    	if ($vote = $this->userHasVoted($voter, $contest)) {

    		$oldChoiceContestant = $vote->contestant;

    		if (!$oldChoiceContestant->is($newContestant)) {

    			$vote = $this->update($vote, $newContestant, $oldChoiceContestant);

    			return response()->json([
    				'status' => true,
    				'data' => $vote
    			]);
    		}
    	}

    	if ($this->vote($request)) {
    		$newContestant->vote();
    	}

    	return response()->json([
    		'status' => true,
    		'data' => $vote
    	]);
    }

    private function vote(Request $request)
    {
    	$vote = new Vote();

    	$vote->contestant_id = $request->contestant_id;
    	$vote->voter_id = $request->voter_id;
    	$vote->contest_id = $request->contest_id;

    	$vote->save();

    	return $vote;
    }

    private function userHasVoted(User $user, Contest $contest)
    {
    	// Check if voter has voted for this contest
    	$vote = Vote::where([['voter_id', '=', $user->id],
    							['contest_id', '=', $contest->id]])
    						->first();
    	if ($vote) {
    		return $vote;
    	}

		return false;
    }

    private function toggleContestantVote(Contestant $newContestant, Contestant $oldContestant)
    {
    	//Increment new contestant vote count
    	$newContestant->vote();

    	//Decrement old contestant vote count.
    	$oldContestant->unVote();
    }

    private function update(Vote $vote, Contestant $newContestant, Contestant $oldContestant)
    {
    	$this->toggleContestantVote($newContestant, $oldContestant);

    	$v = $vote->votedFor($newContestant);


    }
}
