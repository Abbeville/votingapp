<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $url_verification = $request->url_verifcation;

    	return view('pages.user.verification', compact('url_verification'));
    }
}
