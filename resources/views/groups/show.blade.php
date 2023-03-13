@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $group->name }}</h1>

        <ul>
            @foreach ($group->todos as $todo)
                <li>{{ $todo->title }}</li>
            @endforeach
        </ul>
    </div>
@endsection
