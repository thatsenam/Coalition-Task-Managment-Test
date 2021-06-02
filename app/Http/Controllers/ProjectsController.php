<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{


    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }


    public function create()
    {
        return view('projects.create');
    }


    public function store(Request $request)
    {


        $data = $this->getData($request);

        Project::create($data);

        return redirect()->route('projects.project.index')
            ->with('success_message', 'Project was successfully added.');

    }


    public function show($id)
    {
        $project = Project::findOrFail($id);

        return view('projects.show', compact('project'));
    }


    public function edit($id)
    {
        $project = Project::findOrFail($id);


        return view('projects.edit', compact('project'));
    }


    public function update($id, Request $request)
    {


        $data = $this->getData($request);

        $project = Project::findOrFail($id);
        $project->update($data);

        return redirect()->route('projects.project.index')
            ->with('success_message', 'Project was successfully updated.');

    }


    public function destroy($id)
    {

        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.project.index')
            ->with('success_message', 'Project was successfully deleted.');

    }


    protected function getData(Request $request)
    {
        $rules = [
            'name' => 'required|nullable|string|min:1|max:255',
            'description' => 'required|nullable|string|min:1|max:1000',
        ];

        $data = $request->validate($rules);


        return $data;
    }

}
