<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function tasks()
    {
        $tasks = Task::latest()->paginate(10);
        return view('admin.all_tasks' , compact('tasks'));
    }

    public function task_form()
    {
        $users = User::where('admin' , 0)->get();
        return view('admin.add_task' , compact('users'));
    }

    public function add_task(Request $request)
    {
        $request->validate([
            'title'=>'required|min:3|max:255',
            'description'=>'required',
            'user'=>'required',
        ]);

        Task::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'assigned_to'=>$request->user,
            'assigned_by'=>Auth::id(),
        ]);

        return redirect()->route('tasks')->with('success' , 'Task Added Successfully');
    }

    public function tasks_stats()
    {
        $top10_of_users = Task::select('assigned_to')
        ->groupBy('assigned_to')
        ->orderByRaw('COUNT(*) DESC')
        ->take(10)
        ->get();

        return view('admin.tasks_stats' , compact('top10_of_users'));
    }
}
