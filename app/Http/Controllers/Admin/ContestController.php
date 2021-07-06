<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contest;
use App\Models\Category;

class ContestController extends Controller
{
    public function index()
    {
        $contests = Contest::all()
                                ->groupBy('category_id')
                                ->keyBy(function($item){
                                        return $item[0]->category->name;
                                    });

    	return view('pages.admin.votes.contest.index', compact('contests'));
    }

    public function create()
    {
        $categories = Category::all();
    	return view('pages.admin.votes.contest.create', compact('categories'));
    }

    public function show(Contest $contest)
    {
    	return view('pages.admin.votes.contest.show', compact('contest'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required'
        ]);

    	$contest = new Contest();


    	$contest->title = $request->title;
        $contest->category_id = $request->category_id;
    	$contest->save();

    	session()->flash('success', 'Contest Added Successfully');

    	return redirect()->back();
    }

    public function delete(Contest $contest)
    {
    	$contest->delete();

    	session()->flash('success', 'Item Deleted');

    	return redirect()->back();
    }
}
