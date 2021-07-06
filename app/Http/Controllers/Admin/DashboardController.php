<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use App\Models\Department;

class DashboardController extends Controller
{
    public function index()
    {

        $registered = User::role('student')->count();
        
    	return view('pages.admin.dashboard', get_defined_vars());
    }
}
