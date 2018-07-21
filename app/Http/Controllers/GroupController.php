<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $groups=$user->groups;
        if (Request::is('api*')) {
            return Response::json($groups, 200);
        }
        return view('group/index',compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('group/create')->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $group= new \App\Group;
        $group->name=$request->get('name');
        $group->user_id=$id = $user->id;
        $group->save();

        $groups=$user->groups;

        if (Request::is('api*')) {
           return response()->json($group, 201);
        }
        
        return view('group.grouplist',compact('groups'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = \App\Group::find($id);
        return view('group/edit',compact('group','id'))->render();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $group= \App\Group::find($id);
        $group->name=$request->get('name');
        $group->user_id=$user->id;;
        $group->save();

        if (Request::is('api*')) {
           return response()->json($article, 200);
        }
         

        $groups=$user->groups;
        return view('group.grouplist',compact('groups'))->render();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $group = \App\Group::find($id);
        $group->delete();
        if (Request::is('api*')) {
           return response()->json(null, 204);
        }
         
        $groups=$user->groups;
        return view('group.grouplist',compact('groups'))->render();
       
    }

    public function getTasksByGroupId($groupId)
    {
        $group=\App\Group::find($groupId);
        $tasks=$group->tasks;
        return view('task.tasklist',compact('tasks'))->render();;
    }
}