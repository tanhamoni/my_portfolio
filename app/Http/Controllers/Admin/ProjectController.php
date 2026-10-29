<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    // Project List
    public function index()
    {
        $projects = Project::orderBy('serial', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.projects.index', compact('projects'));
    }

    // Add Project Page
    public function create()
    {
        return view('admin.projects.create');
    }

    // Save New Project
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'technology' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'github' => 'nullable|url|max:255',
            'live' => 'nullable|url|max:255',
            'featured' => 'nullable|boolean',
            'serial' => 'required|integer|min:0',
        ]);

        $imageName = null;

        try {
            if ($request->hasFile('image')) {
                $imageName = Str::uuid() . '.' .
                    $request->file('image')->extension();

                $saved = $request->file('image')->storeAs(
                    'projects',
                    $imageName,
                    'public'
                );

                if ($saved === false) {
                    throw new \RuntimeException('Image upload failed.');
                }
            }

            $project = new Project();

            $project->title = $validated['title'];
            $project->category = $validated['category'];
            $project->description = $validated['description'];
            $project->technology = $validated['technology'];
            $project->github = $validated['github'] ?? null;
            $project->live = $validated['live'] ?? null;
            $project->featured = $request->boolean('featured');
            $project->serial = $validated['serial'];
            $project->image = $imageName;

            $project->save();

            return redirect()
                ->route('projects.index')
                ->with('success', 'Project Added Successfully');

        } catch (\Throwable $e) {
            if ($imageName) {
                Storage::disk('public')
                    ->delete('projects/' . $imageName);
            }

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Project save failed. Check Render logs.');
        }
    }

    // Edit Project Page
    public function edit($id)
    {
        $project = Project::findOrFail($id);

        return view('admin.projects.edit', compact('project'));
    }

    // Update Project
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'technology' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'github' => 'nullable|url|max:255',
            'live' => 'nullable|url|max:255',
            'featured' => 'nullable|boolean',
            'serial' => 'required|integer|min:0',
        ]);

        $oldImage = $project->image;
        $newImage = null;

        try {
            if ($request->hasFile('image')) {
                $newImage = Str::uuid() . '.' .
                    $request->file('image')->extension();

                $saved = $request->file('image')->storeAs(
                    'projects',
                    $newImage,
                    'public'
                );

                if ($saved === false) {
                    throw new \RuntimeException('Image upload failed.');
                }
            }

            $project->title = $validated['title'];
            $project->category = $validated['category'];
            $project->description = $validated['description'];
            $project->technology = $validated['technology'];
            $project->github = $validated['github'] ?? null;
            $project->live = $validated['live'] ?? null;
            $project->featured = $request->boolean('featured');
            $project->serial = $validated['serial'];

            if ($newImage) {
                $project->image = $newImage;
            }

            $project->save();

            if ($newImage && $oldImage) {
                Storage::disk('public')
                    ->delete('projects/' . $oldImage);
            }

            return redirect()
                ->route('projects.index')
                ->with('success', 'Project Updated Successfully');

        } catch (\Throwable $e) {
            if ($newImage) {
                Storage::disk('public')
                    ->delete('projects/' . $newImage);
            }

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Project update failed. Check Render logs.');
        }
    }

    // Delete Project
    public function delete($id)
    {
        $project = Project::findOrFail($id);

        try {
            $imageName = $project->image;

            $project->delete();

            if ($imageName) {
                Storage::disk('public')
                    ->delete('projects/' . $imageName);
            }

            return redirect()
                ->route('projects.index')
                ->with('success', 'Project Deleted Successfully');

        } catch (\Throwable $e) {
            report($e);

            return back()
                ->with('error', 'Project delete failed.');
        }
    }
}
