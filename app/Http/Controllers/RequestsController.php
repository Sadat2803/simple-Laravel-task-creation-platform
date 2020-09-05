<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use File;
use App\Message;
use App\Events\SendMessage;
class RequestsController extends Controller
{
    //List of request of same department
    public function requests()
    {
        $user = Auth::user();
        $requests = DB::table('requests')
                    ->where('requests.range_id','<=',$user->range_id)
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
            ->where('requests.state',"processing")
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
    //List of user's finished word
    public function userFinishedRequests()
    {
        $user = Auth::user();
        $requests = DB::table('requests')
            ->where('requests.treated_by',$user->id)
            ->where('requests.state',"finished")
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
        return view('work_requests.user_finished_requests')->with(['requests'=>$requests]);
    }

    //List of work requests made by user
    public function userRequests()
    {
        $user = Auth::user();
        $requests = DB::table('requests')
            ->where('requests.user_id',$user->id)
            ->leftJoin('ranges', 'ranges.id', 'requests.range_id')
            ->leftJoin('users', 'users.id', 'requests.treated_by')
            ->select(  'requests.id as request_id',
                'requests.description as request_description',
                'requests.state as request_state',
                'requests.treated_by as treated_by',
                'users.last_name as treater_name',
            'ranges.name as request_range')
            ->get();
        return view('work_requests.user_requests')->with(['requests'=>$requests]);
    }

    public function selectRequest(Request $request)
    {
        \App\Request::findOrFail($request->request_id)->update(['state'=>"processing","treated_by"=>Auth::user()->id]);
        return redirect("requests");
    }
    public function createRequest(Request $request)
    {
        $user = Auth::user();

        $newRequest = \App\Request::create(['user_id'=>$user->id,'description'=>$request->description,"range_id"=>$request->range]);
        $newRequest->save();
        $path = $newRequest->id.'_uploads';
        if(!File::exists($path))
        {
            File::makeDirectory($path);
        }
        return redirect()->back()->with('success', 'Demande de travail créée avec succès');

    }
    public function closeRequest(Request $request)
    {
        \App\Request::findOrFail($request->request_id)->update(['state'=>"finished"]);
        return redirect()->back()->with('success', 'Demande cloturée avec succès');
    }
    public function receivedDocuments($request_id)
    {
        $folder_name = $request_id.'_uploads';
        $path = public_path($folder_name);
        $files=[];
        if(File::exists($folder_name))
        {
            $files = File::allFiles($path);
        }
        $myList = [];
        foreach ($files as $file)
        {
            $path = $request_id.'_uploads/'.$file->getFilename();
            array_push($myList,$path);
        }
        return view('work_requests.received_documents')->with(['files'=>$myList]);
    }
    public function fileUpload(Request $request)
    {
        $message = Message::create([
            'from_id' =>  Auth::user()->id,
            'to_id' => $request->user_id,
            'message' => "Un travail relatif à la demande N°".$request->request_id." a été délivré. Veuilliez consulter la demande pour le visualiser"
        ]);
        broadcast(new SendMessage($message));

        $request->validate([
            'file' => 'required|max:2048',
        ]);



        $fileName = time().'.'.$request->file->extension();
        $path = $request->request_id.'_uploads';
        $request->file->move(public_path($path), $fileName);


        return back()
            ->with('success','Le demandeur peut maintenant voir le travail envoyé ')
            ->with('file',$fileName);
    }
}
