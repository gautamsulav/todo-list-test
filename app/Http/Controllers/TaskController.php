<?php

namespace App\Http\Controllers;

use App\Task;
use App\Group;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks=\App\Task::all();
        if (Request::is('api*')) {
           return response()->json($$tasks, 200);
        }
        return view('task/index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups=\App\Group::all();
        return view('task/create',compact('groups'))->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task= new \App\Task;
        $task->name=$request->get('name');
        $status=$request->get('status');
        if($status=='completed')
        {
          $task->complete=true;
        }else
        {
            $task->complete=false;
        }
        
        $task->group_id=$request->get('group');;
        $task->save();

        $tasks=\App\Task::all();
        return view('task.tasklist',compact('tasks'))->render();
        //$returnHTML = view('task/tasklist',compact('tasks'))->render();
        //return response()->json(array('success' => true, 'html'=>$returnHTML));
    
        //return redirect('tasks')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $groups=\App\Group::all();
        $task = \App\Task::find($id);
        return view('task/edit',compact('task','id','groups'))->render();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  
        $task= \App\Task::find($id);
        $task->name=$request->get('name');
        $status=$request->get('status');
        if($status=='completed')
        {
          $task->complete=true;
        }else
        {
            $task->complete=false;
        }
        
        $task->group_id=$request->get('group');;
        $task->save();
        
        $tasks=\App\Task::all();
        return view('task.tasklist',compact('tasks'))->render();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = \App\Task::find($id);
        $task->delete();
        $tasks=\App\Task::all();
        return view('task.tasklist',compact('tasks'))->render();
       
    }

    public function changeTaskStatus($taskId)
    {

        $task = \App\Task::find($id);
        if($task->complete==false)
        {
            $task->complete=true;
        }
        else
        {
            $task->complete=false;
        }
        $task->save();;
        return 'Status Changed'
    }
}
