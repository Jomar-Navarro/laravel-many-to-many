<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Functions\Helper as Help;
use App\Http\Requests\ProjectRequest;
use App\Models\Technology;
use App\Models\Type;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(isset($_GET['toSearch'])){
            $projects = Project::where('title', 'LIKE', '%' . $_GET['toSearch'] . '%')->paginate(15);
        }else{
            $projects = Project::orderBy('id', 'desc')->paginate(15);
        }

        return view('admin.Projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technology = Technology::all();

        $types = Type::all();

        return view('admin.Projects.create', compact('technology', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $form_data = $request->all();



        $form_data['slug'] = Help::generateSlug($form_data['title'], Project::class);

        $new = new Project();
        $new->fill($form_data);
        $new->save();


        if(array_key_exists('types', $form_data)){
            $new->types()->attach($form_data['types']);
        }

        return redirect()->route('admin.projects.show', $new);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {

        return view('admin.Projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $technology = Technology::all();
        $types = Type::all();

        return view('admin.Projects.edit', compact('project', 'technology', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $form_data = $request->all();

        // $val_data = $request->validate([
        //     'title' => 'required|min:2|max:20',
        //     // 'description' => 'required',
        //     // 'project_url' => 'required|url',
        //     // 'completion_date' => 'required|date',
        // ],
        // [
        //     'title.required' => 'Name of the project is required.',
        //     'title.min' => 'The project name should have at least 2 characters.',
        //     'title.max' => 'The project name should have a maximum of 20 characters.',
        //     // 'description.required' => 'Description is required.',
        //     // 'project_url.required' => 'Project URL is required.',
        //     // 'project_url.url' => 'Project URL should be a valid URL.',
        //     // 'completion_date.required' => 'Completion date is required.',
        //     // 'completion_date.date' => 'Completion date should be a valid date.',
        // ]);

        if ($form_data['title'] !== $project->title) {
            $form_data['slug'] = Help::generateSlug($request->title, Project::class);
        }else {
            $form_data['slug'] = $project->slug;
        }

        $project->update($form_data);

        if(array_key_exists('types', $form_data)){
            $project->types()->sync($form_data['types']);
        }else{
            $project->types()->detach();
        }


        return redirect()->route('admin.projects.show', $project)->with('success', 'Project modified successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

            return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully!');

    }
}
