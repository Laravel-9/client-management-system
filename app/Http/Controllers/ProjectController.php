<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('user', 'client')->latest()->get();
        return view('projects.index', compact('projects'));
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
        return view('projects.create', compact('users', 'clients'));
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
            'deadline' => 'required',
            'status' => 'required'
        ],[], $this->attributes() );
        $validated['deadline'] = Carbon::createFromFormat('d/m/Y', $request->deadline)->format('Y-m-d');
        Project::create($validated);
        return redirect()->route('projects.index')->with('success', 'Project has been created successfully!');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return $project = Project::with('user', 'client', 'task')->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $users = User::get();
        $clients = Client::get();
        $project['deadline'] = Carbon::createFromFormat('Y-m-d', $project['deadline'])->format('d/m/Y');
        return view('projects.edit', compact('project', 'users', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'user_id' => 'required',
            'client_id' => 'required',
            'deadline' => 'required',
            'status' => 'required'
        ],[], $this->attributes() );
        $validated['deadline'] = Carbon::createFromFormat('d/m/Y', $request->deadline)->format('Y-m-d');
        $project->update($validated);
        return redirect()->route('projects.index')->with('success', 'Project has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project has been deleted successfully!');
    }

    public function attributes()
    {
        return [
            'user_id' => 'User',
            'client_id' => 'Client',
        ];
    }
}
