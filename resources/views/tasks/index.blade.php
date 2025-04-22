@extends('layout')

@section('content')
    <div class="page-header">
        <h1>All Tasks</h1>
        <a href="{{ route('tasks.create') }}" class="btn">Create New Task</a>
    </div>
    
    @if($tasks->isEmpty())
        <div class="card">
            <p>No tasks yet. Create your first task!</p>
        </div>
    @else
        @foreach ($tasks as $task)  
            <div class="card">
                <h2><a href="{{ route('tasks.index', $task->id) }}" style="color: var(--gray-800); text-decoration: none; hover:text-decoration: underline;">{{ $task->title }}</a></h2>
                <p>{{ Str::limit($task->description, 150) }}</p>
                
                <div class="task-actions">
                    <!--<a href="{{ route('tasks.show', $task->id) }}" class="btn">Show Description</a>-->
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-secondary">Edit</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
    
    <style>
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
    </style>
@endsection