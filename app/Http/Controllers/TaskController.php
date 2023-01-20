<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\User;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::with('user', 'client')->latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();
        $clients = Client::get();
        $projects = Project::get();
        return view('tasks.create', compact('users', 'clients', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'user_id' => 'required',
            'client_id' => 'required',
            'project_id' => 'required',
            'deadline' => 'required',
            'status' => 'required'
        ],[], $this->attributes() );
        $validated['deadline'] = Carbon::createFromFormat('d/m/Y', $request->deadline)->format('Y-m-d');
        Task::create($validated);
        return redirect()->route('tasks.index')->with('success', 'Task has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::with('user', 'client', 'project')->find($id);
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $users = User::get();
        $clients = Client::get();
        $projects = Project::get();
        $task['deadline'] = Carbon::createFromFormat('Y-m-d', $task['deadline'])->format('d/m/Y');
        return view('tasks.edit', compact('task', 'users', 'clients', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'user_id' => 'required',
            'client_id' => 'required',
            'project_id' => 'required',
            'deadline' => 'required',
            'status' => 'required'
        ],[], $this->attributes() );
        $validated['deadline'] = Carbon::createFromFormat('d/m/Y', $request->deadline)->format('Y-m-d');
        $task->update($validated);
        return redirect()->route('tasks.index')->with('success', 'Task has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task has been deleted successfully!');
    }

    public function attributes()
    {
        return [
            'user_id' => 'User',
            'client_id' => 'Client',
            'project_id' => 'Project',
        ];
    }
}
