<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToDo;
use Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toDoArray = ToDo::where('user_id',auth()->user()->id)->orderBy('is_done','ASC')->get();
        return view('home',['toDoArray'=>$toDoArray]);
    }
}
