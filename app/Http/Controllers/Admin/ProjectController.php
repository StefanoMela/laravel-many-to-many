<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreProjectRequest;
use App\Http\Requests\Auth\UpdateProjectRequest;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Str;
use Termwind\Components\Dd;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Laravel Boolfolio - Base';
        $projects = Project::orderby('id', 'desc')->paginate(15); // paginazione con ordine discdente in base all' ID
        return view('admin.projects.index', compact('title', 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $technologies = Technology::all();
        $types = Type::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();


        $project = new Project();
        $data['slug'] = Str::slug($data['title']);
        $project->fill($data);
        $project->save();
        $project->technologies()->attach($data['technologies']);

        return redirect()
            ->route('admin.projects.show', $project)
            ->with('message_type', 'success')
            ->with('message', 'Progetto creato con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {

        // $project = Project::findOrFail($id) -> metodo usabile quando non usiamo la dependecy injection
        $technologies = Technology::all();
        $types = Type::all();
        $tech_ids = $project->technologies->pluck('id')->toArray();
        return view('admin.projects.edit', compact('project', 'types', 'technologies', 'tech_ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['title']);
        $project->update($data);

        if (isset($data['technologies'])) {
            $project->technologies()->sync($data['technologies']);
        } else {
            $project->technologies()->detach();
        }

        return redirect()
            ->route('admin.projects.show', $project)
            ->with('message_type', 'success')
            ->with('message', 'Progetto modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->technologies()->detach();
        $project->delete();
        return redirect()
            ->route('admin.projects.index')
            ->with('message_type', 'danger')
            ->with('message', 'Progetto eliminato con successo');
    }
}
