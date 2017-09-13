<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        if (!$request->user()->hasRoles(['admin'])) {
            abort(401);
        }
        $users = User::orderBy('created_at', 'desc')-take(10)->toArray();
        return view('admin.index', ['users' => $users]);
    }

}
