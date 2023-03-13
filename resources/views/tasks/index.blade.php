@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>ToDO List</h1>

        <div class="row mb-4">
            <div class="col">
                <a href="{{ route('tasks.create') }}" class="btn btn-primary">New Task</a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Group</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->group->name }}</td>
                                <td>{{ $task->completed ? 'Completed' : 'Incomplete' }}
                                
                                
                                    <form class="task-form" action="{{ route('tasks.update', $task->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-check">
                                            <input class="form-check-input task-checkbox" type="checkbox" name="completed" value="1" {{ $task->completed ? 'checked' : '' }}>
                                            <label class="form-check-label {{ $task->completed ? 'completed' : '' }}">
                                                {{ $task->title }}
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Complete</button>
                                    </form>
                                
                                
                                </td>
                                <td>
                                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            
           
        </div>
    </div>
@endsection
