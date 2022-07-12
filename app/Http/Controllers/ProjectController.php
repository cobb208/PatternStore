<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Auth::user()
            ->projects()
            ->where('is_complete', '=', '0')
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('projects.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     */
    public function store(StoreProjectRequest $request)
    {
        $validatedData = $request->validate([
          'title' => ['required', 'max:255', 'unique:projects'],
            'yarn_type' => ['max:255', 'nullable'],
            'hook_size' => ['numeric', 'nullable'],
            'notes' => ['nullable']
        ]);

        $p = new Project;

        $p->title = $validatedData['title'];
        $p->yarn_type = $validatedData['yarn_type'];
        $p->hook_size = $validatedData['hook_size'];
        $p->notes = $validatedData['notes'];
        $p->user_id = Auth::user()->id;

        $p->save();

        return redirect()->route('projects.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     */
    public function show(Project $project)
    {
        if(!Gate::allows('view', $project)) abort(401);
        $p = Project::find($project['id']);

        return view('projects.show', ['project' => $p]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     */
    public function edit(Project $project)
    {
        if(!Gate::allows('update', $project)) abort(401);

        $p = Project::find($project['id']);
        return view('projects.edit', ['project' => $p]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        if(!Gate::allows('update', $project)) abort(401);

        $validatedData = $request->validate([
            'title' => ['required', 'max:255'],
            'yarn_type' => ['max:255', 'nullable'],
            'hook_size' => ['numeric', 'nullable'],
            'notes' => ['nullable']
        ]);

        $p = Project::find($project['id']);

        $p->title = $validatedData['title'];
        $p->yarn_type = $validatedData['yarn_type'];
        $p->hook_size = $validatedData['hook_size'];
        $p->notes = $validatedData['notes'];

        $p->touch();

        return view('projects.show', ['project' => $p]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     */
    public function destroy(Project $project)
    {
        if(!Gate::allows('delete', $project)) abort(401);
        $p = Project::find($project['id']);
        $p->delete();

        return redirect()->route('projects');
    }

    public function complete(Project $project)
    {
        if(!Gate::allows('update', $project)) abort(401);

        $p = Project::find($project['id']);
        $p->is_complete = true;

        $p->save();

        return redirect()->route('projects.index');
    }

    public function completed()
    {
        $projects = Auth::user()
            ->projects()
            ->where('is_complete', '=', '1')
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('projects.completed', ['projects' => $projects]);
    }
}
