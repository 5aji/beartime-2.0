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
    public function dashboard(Request $request) {
        return view('user.dashboard', ['user' => $request->user()]);
    }

}
