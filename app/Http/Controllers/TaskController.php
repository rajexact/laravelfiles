<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function create()
    {
        return view("add_task");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "task_name" => "required|string|max:255",
            // Add other validation rules as needed
        ]);

        $task = new Task();
        $task->name = $request->input("task_name");
        // Add other fields as needed
        $task->save();

        return redirect()->route("tasks.create")->with("success", "Task created successfully.");
    }
}
