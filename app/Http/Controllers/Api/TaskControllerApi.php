<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskControllerApi extends Controller
{
    public function create_task(Request $request)
    {
        $request->validate([
            'title'=>'required|min:3|max:255',
            'description'=>'required',
            // 'user'=>'required',
        ]);

        $task = Task::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'assigned_to'=>$request->user,
            'assigned_by'=>Auth::id(),
        ]);

        return response()->json(['success'=>true , 'data'=>$task]);
    }

    public function all_tasks()
    {
       $tasks = Task::with(['user' , 'admin'])->get();
       return response()->json(['data'=>$tasks]);
    }
}
