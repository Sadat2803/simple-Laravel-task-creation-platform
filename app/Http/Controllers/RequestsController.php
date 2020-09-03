<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RequestsController extends Controller
{
    //List of request of same department
    public function requests()
    {
        $user = Auth::user();
        $requests = DB::table('requests')
                    ->whereIn('state',['pending'])
                    ->leftJoin('users', 'users.id', 'requests.user_id')
                    ->leftJoin('departments', 'departments.id', 'users.department_id')
                    ->where('departments.type',$user->department->type)
                    ->select(  'users.id as user_id',
                                        'users.first_name as first_name',
                                        'users.last_name as last_name',
                                        'requests.id as request_id',
                                        'requests.description as request_description',
                                        'requests.state as request_state',
                                        'departments.id as department_id',
                                        'departments.name as department_name')
                    ->get();
        return view('work_requests.index')->with(['requests'=>$requests]);
    }
    //List of work being processed by user
    public function userProcessingRequests()
    {
        $user = Auth::user();
        $requests = DB::table('requests')
            ->where('requests.treated_by',$user->id)
            ->leftJoin('users', 'users.id', 'requests.user_id')
            ->leftJoin('departments', 'departments.id', 'users.department_id')
            ->select(  'users.id as user_id',
                'users.first_name as first_name',
                'users.last_name as last_name',
                'requests.id as request_id',
                'requests.description as request_description',
                'requests.state as request_state',
                'departments.id as department_id',
                'departments.name as department_name')
            ->get();
        return view('work_requests.user_processing_requests')->with(['requests'=>$requests]);
    }



    //List of work requests made by user
    public function userRequests()
    {
        $user = Auth::user();
        $requests = DB::table('requests')
            ->where('requests.user_id',$user->id)
            ->leftJoin('users', 'users.id', 'requests.treated_by')
            ->select(  'requests.id as request_id',
                'requests.description as request_description',
                'requests.state as request_state',
                'requests.treated_by as treated_by',
                'users.last_name as treater_name')
            ->get();
        return view('work_requests.user_requests')->with(['requests'=>$requests]);
    }

    public function selectRequest(Request $request)
    {
        \App\Request::findOrFail($request->request_id)->update(['state'=>"processing","treated_by"=>Auth::user()->id]);
        return redirect("requests");
    }

}
