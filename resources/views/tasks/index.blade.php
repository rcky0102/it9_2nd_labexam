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

                <h2>
                    {{ $task->title }}
                    @if ($task->completed)
                        <span style="color: var(--success); font-size: 0.9rem;">(Completed)</span>
                    @endif
                </h2>

                <p>{{ Str::limit($task->description, 150) }}</p>


                <div class="task-actions">

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