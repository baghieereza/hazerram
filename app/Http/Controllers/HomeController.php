<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return void
     */
    public function index()
    {
        if (Gate::allows('isTeacher')) {
            return view('users.teacher');
        }
        if (Gate::allows('isManager')) {
            return view('users.manager');
        }
        if (Gate::allows('isAdmin')) {
            return view('users.admin');
        }
        if (Gate::allows('isStudent')) {
            return view('users.student');
        }



    }
}
