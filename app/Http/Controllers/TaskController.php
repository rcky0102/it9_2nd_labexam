<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    
    public function create()
    {
        return view('tasks.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->has('completed'),
        ]);
        
        

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    
    public function update(Request $request, Task $task)
    {
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->has('completed'),
        ]);
        

        $task->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'completed' => $request->boolean('completed'),
        ]);
        

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}
