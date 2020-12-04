<?php

namespace App\Http\Controllers;

use App\Http\helper;
use App\Notifications\InvoicePaid;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
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
        helper::sendSMS('teacher', 'ریاضی 1', 'شهید مفتح', 'https://link.com');
        return view('home');

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
