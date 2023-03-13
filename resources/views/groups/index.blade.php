@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Groups</h1>

        <ul>
            @foreach ($groups as $group)
                <li><a href="{{ route('groups.show', $group->id) }}">{{ $group->name }}</a></li>
            @endforeach
        </ul>
    </div>
@endsection
