@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Edit task</h1>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to tasks</a>
    </div>
    
    <div class="card">
        <form method="POST" action="{{ route('tasks.update', $task->id) }}">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $task->title) }}" required>
            </div>
            
            <div class="form-group">
                <label for="description" class="form-label">Content</label>
                <textarea id="description" name="description" class="form-control" required>{{ old('description', $task->description) }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">
                    <input type="checkbox" name="completed" {{ old('completed', $task->completed) ? 'checked' : '' }}>
                    Mark as Completed
                </label>
            </div>
            
            
            <div class="form-actions">
                <button type="submit" class="btn">Update task</button>
                <a href="{{ route('tasks.index', $task->id) }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
    
    <style>
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        
        .form-actions {
            display: flex;
            gap: 1rem;
        }
    </style>
@endsection