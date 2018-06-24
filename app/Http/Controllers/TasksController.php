<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks =  Task::all();

    return view('tasks.index',['tasks'=>$tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task;

        return view('tasks.create',['task'=>$task]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
            'title' =>'required|max:191',
            'status'=>'required|max:10',
        ]);
        
        $user_id =\Auth::user()->id;
        $task = new Task;
        $task->content = $request->content;
        $task->title = $request->title;
        $task->status = $request->status;
        $task->user_id = $user_id;
        $task->save();
        
        return redirect('tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id =\Auth::user()->id;
        
        $task = Task::find($id);
        $task_id = $task ->user_id;

        if($user_id == $task_id){
        $task = Task::find($id);

    return view('tasks.show',['task' => $task]);
        }
        else{
            return redirect('/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $task = task::find($id);

        return view('tasks.edit', [
            'task' => $task,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'content' => 'required|max:191',
            'title' => 'required|max:191',
            'status'=>'required|max:10',
            ]
            );
        
        
      $task = task::find($id);
        $task->content = $request->content;
        $task->title = $request ->title;
        $task->status = $request ->status;
        $task->save();

        return redirect('tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $task = Task::find($id);

        $task->delete();

        return redirect('tasks');
    }
}
