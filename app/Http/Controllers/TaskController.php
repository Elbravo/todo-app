<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Group;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with('group')->get();
        $groups = Group::all();
        $tasks = Task::where('completed', false)->get();

        return view('tasks.index', compact('tasks', 'groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = Group::all();

        return view('tasks.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        Task::create([
            'title' => $request->title,
            'group_id' => $request->group_id,
        ]);

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $groups = Group::all();
        

        return view('tasks.edit', compact('task', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            ]);

            $task = Task::findOrFail($id);
            $task->title = $request->title;
            $task->group_id = $request->group_id;
            $task->completed = $request->completed;
            $task->save();
        
            return redirect()->route('tasks.index');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $task = Task::findOrFail($id);
    $task->delete();

    return redirect()->route('tasks.index');
}
}

