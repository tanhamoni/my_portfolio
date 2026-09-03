<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Project List
    public function index()
    {
        $projects = Project::orderBy('serial', 'asc')->latest()->get();

        return view('admin.projects.index', compact('projects'));
    }

    // Add Project Page
    public function create()
    {
        return view('admin.projects.create');
    }

    // Store Project
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'technology' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'github' => 'nullable',
            'live' => 'nullable',
            'featured' => 'nullable',
            'serial' => 'required|integer',
        ]);

        $project = new Project();

        $project->title = $request->title;
        $project->category = $request->category;
        $project->description = $request->description;
        $project->technology = $request->technology;
        $project->github = $request->github;
        $project->live = $request->live;
        $project->featured = $request->featured ?? 0;
        $project->serial = $request->serial;

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads/projects'), $imageName);

            $project->image = $imageName;
        }

        $project->save();

        return redirect()->route('projects.index')
            ->with('success', 'Project Added Successfully');
    }

    // Edit Page
    public function edit($id)
    {
        $project = Project::findOrFail($id);

        return view('admin.projects.edit', compact('project'));
    }

    // Update Project
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'technology' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'github' => 'nullable',
            'live' => 'nullable',
            'featured' => 'nullable',
            'serial' => 'required|integer',
        ]);

        $project->title = $request->title;
        $project->category = $request->category;
        $project->description = $request->description;
        $project->technology = $request->technology;
        $project->github = $request->github;
        $project->live = $request->live;
        $project->featured = $request->featured ?? 0;
        $project->serial = $request->serial;

       

        if ($request->hasFile('image')) {

            if ($project->image && file_exists(public_path('uploads/projects/' . $project->image))) {
                unlink(public_path('uploads/projects/' . $project->image));
            }

            $image = $request->file('image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads/projects'), $imageName);

            $project->image = $imageName;
        }

        $project->save();

        return redirect()->route('projects.index')
            ->with('success', 'Project Updated Successfully');
    }

    // Delete Project
    public function delete($id)
    {
        $project = Project::findOrFail($id);

        if ($project->image && file_exists(public_path('uploads/projects/' . $project->image))) {
            unlink(public_path('uploads/projects/' . $project->image));
        }

        $project->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Project Deleted Successfully');
    }
}