@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Create New Post</h1>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to tasks</a>
    </div>
    
    <div class="card">
        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            
            <div class="form-group">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" class="form-control" placeholder="Enter task title" value="{{ old('title') }}" required>
            </div>
            
            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" class="form-control" placeholder="Write your task description here..." required>{{ old('description') }}</textarea>
            </div>
            
            <button type="submit" class="btn">Save Task</button>
        </form>
    </div>
    
    <style>
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
    </style>
@endsection