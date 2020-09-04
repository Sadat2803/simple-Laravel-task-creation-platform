<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index()
    {
        $users = DB::table('users')
            ->where('users.role','=',0)
            ->leftJoin('departments', 'departments.id', 'users.department_id')
            ->leftJoin('ranges', 'ranges.id', 'users.range_id')
            ->select(  'users.id as user_id',
                'users.first_name as first_name',
                'users.last_name as last_name',
                'users.email as user_email',
                'ranges.name as range_name',
                'departments.id as department_id',
                'departments.name as department_name',
                'departments.type as department_type')
            ->get();
        return view('admin.users_index')->with(['users'=>$users]);
    }
    public function createUser(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $userData = $request->except(['password']);
        $userData["password"]=Hash::make($request->password);
        User::create($userData);
        return redirect()->back()->with('success', 'Utilisateur créé avec succès');
    }
}
