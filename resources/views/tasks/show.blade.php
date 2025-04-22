@extends('layout')

@section('content')
    <div class="page-header">
        
        <h1>{{ $task->title }}</h1>

        <div class="task-actions">
            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-secondary">Edit</a>
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
            </form>
        </div>
    </div>
    
    <div class="card">
        <div class="task-content">
            {{ $task->body }}
        </div>
        
        <div class="task-footer">
            <a href="{{ route('tasks.index') }}" class="btn">Back to all tasks</a>
        </div>
    </div>
    
    <style>
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        
        .task-content {
            margin-bottom: 2rem;
            line-height: 1.8;
        }
        
        .task-footer {
            padding-top: 1.5rem;
            border-top: 1px solid var(--gray-200);
        }
    </style>
@endsection