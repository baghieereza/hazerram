<?php

namespace App\Http\Controllers;

use App\Repository\classesRepository;
use Illuminate\Http\Request;
use App\Notifications\PushDemo;
use App\Models\User;
use Auth;
use Notification;

class ClassesController extends Controller
{

    public $classes;

    public function __construct(classesRepository $classesRepository)
    {
        $this->classes = $classesRepository;
        $this->middleware('auth');
    }

    public function changeStatus($id)
    {
        $this->classes->changeStatus($id);
        return redirect()->route("home");
    }
}
