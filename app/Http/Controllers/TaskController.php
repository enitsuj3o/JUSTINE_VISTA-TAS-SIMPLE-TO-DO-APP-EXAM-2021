<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Gate;
use Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TaskController extends Controller
{
    function index() {
        $data = Task::all();
        
        return view('index', [
            'data' => $data, 
            'button_title' => 'Add New Task'
        ]);
    }

    public function create()
    {
    
    }

    public function store(Request $request)
    {
        $validator = validator::make($request->all() , 
        [
            "task" => "required|unique:tasks",
            "owner" => "required",
            "status" => "required"
        ]);

        $mytime = Carbon::now()->format('Y-m-d');

        if($validator->fails()){
            return back()->withErrors($validator)->
            withInput();
        }



        Task::create([
            "task" => $request->task,
            "date_created" => $mytime,
            "owner" => $request->owner,
            "status" => $request->status
        ]);

        return redirect('/')->with('success', 'New Task has been added.');
    }

    public function update(Request $request)
    {
        //dd($request->all());
        $validator = validator::make($request->all() , 
        [
            "task" => "required",
            "owner" => "required",
            "status" => "required"
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->
            withInput();
        }

       
        $task=Task::find($request->task_id);
        $task->task = $request->task;
        $task->owner = $request->owner;
        $task->status  = $request->status;
        $task->save();

        return redirect('/')->with('success','Task has been updated.');
    }

    public function destroy(Request $request)
    {

        // dd($request->all());
        $task=Task::find($request->task_id);
        $task->delete();
        return redirect('/')->with('success', 'Task has been deleted.');
    }

}
