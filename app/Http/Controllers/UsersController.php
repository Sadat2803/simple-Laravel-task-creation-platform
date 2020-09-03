<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id','!=',Auth::user()->id)->get();
        return view('users.index')->with(['users'=>$users]);
    }
}
