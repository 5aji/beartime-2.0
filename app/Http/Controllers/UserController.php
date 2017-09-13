<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function options(Request $request) {
        return view('user.options', ['user' => $request->user()]);
    }
    public function home(Request $request) {
        return view('user.home', ['user' => $request->user()]);
    }

    /**
     * generates the user's custom schedule.
     * @return \App\Schedule $schedule the user's custom schedule.
     */
    public function schedule() {

    }
}
