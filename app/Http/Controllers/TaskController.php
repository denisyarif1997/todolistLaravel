<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $task = new Task();
        $task->name = $request->input('name');
        $task->save();

        return redirect()->route('tasks.index');
    }

    public function update(Request $request, Task $task)
    {
        $task->completed = $request->has('completed');
        $task->save();

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
