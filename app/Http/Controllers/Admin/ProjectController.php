<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Services\CloudinaryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('serial', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view(
            'admin.projects.index',
            compact('projects')
        );
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(
        Request $request,
        CloudinaryService $cloudinary
    ) {
        $validated = $this->validateProject($request);

        $newImage = null;

        try {
            if ($request->hasFile('image')) {
                $newImage = $cloudinary->upload(
                    $request->file('image'),
                    'portfolio/projects'
                );
            }

            $project = new Project();

            $this->fillProject(
                $project,
                $validated,
                $request
            );

            $project->image = $newImage;

            $project->save();

            return redirect()
                ->route('projects.index')
                ->with(
                    'success',
                    'Project Added Successfully'
                );

        } catch (\Throwable $e) {
            if ($newImage) {
                try {
                    $cloudinary->delete($newImage);
                } catch (\Throwable $cleanupError) {
                    report($cleanupError);
                }
            }

            report($e);

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Project save failed. Check logs.'
                );
        }
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);

        return view(
            'admin.projects.edit',
            compact('project')
        );
    }

    public function update(
        Request $request,
        $id,
        CloudinaryService $cloudinary
    ) {
        $project = Project::findOrFail($id);

        $validated = $this->validateProject($request);

        $oldImage = $project->image;
        $newImage = null;

        try {
            if ($request->hasFile('image')) {
                $newImage = $cloudinary->upload(
                    $request->file('image'),
                    'portfolio/projects'
                );
            }

            $this->fillProject(
                $project,
                $validated,
                $request
            );

            if ($newImage) {
                $project->image = $newImage;
            }

            $project->save();

        } catch (\Throwable $e) {
            if ($newImage) {
                try {
                    $cloudinary->delete($newImage);
                } catch (\Throwable $cleanupError) {
                    report($cleanupError);
                }
            }

            report($e);

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Project update failed. Check logs.'
                );
        }

        if ($newImage && $oldImage) {
            $this->cleanupImage(
                $cloudinary,
                $oldImage
            );
        }

        return redirect()
            ->route('projects.index')
            ->with(
                'success',
                'Project Updated Successfully'
            );
    }

    public function delete(
        $id,
        CloudinaryService $cloudinary
    ) {
        $project = Project::findOrFail($id);

        $image = $project->image;

        try {
            $project->delete();

        } catch (\Throwable $e) {
            report($e);

            return back()->with(
                'error',
                'Project delete failed.'
            );
        }

        if ($image) {
            $this->cleanupImage(
                $cloudinary,
                $image
            );
        }

        return redirect()
            ->route('projects.index')
            ->with(
                'success',
                'Project Deleted Successfully'
            );
    }

    private function validateProject(
        Request $request
    ): array {
        return $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'technology' => 'required|string',
            'image' =>
                'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'github' => 'nullable|url|max:255',
            'live' => 'nullable|url|max:255',
            'featured' => 'nullable|boolean',
            'serial' => 'required|integer|min:0',
        ]);
    }

    private function fillProject(
        Project $project,
        array $validated,
        Request $request
    ): void {
        $project->title = $validated['title'];
        $project->category = $validated['category'];
        $project->description =
            $validated['description'];
        $project->technology =
            $validated['technology'];
        $project->github =
            $validated['github'] ?? null;
        $project->live =
            $validated['live'] ?? null;
        $project->featured =
            $request->boolean('featured');
        $project->serial =
            $validated['serial'];
    }

    private function cleanupImage(
        CloudinaryService $cloudinary,
        string $image
    ): void {
        try {
            $cloudinary->delete($image);
        } catch (\Throwable $e) {
            Log::warning(
                'Project image cleanup failed',
                ['message' => $e->getMessage()]
            );
        }
    }
}