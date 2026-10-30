<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function index()
    {
        $resumes = Resume::latest()->get();

        return view(
            'admin.resume.index',
            compact('resumes')
        );
    }

    public function create()
    {
        return view('admin.resume.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Resume::create($validated);

        return redirect()
            ->route('resume.index')
            ->with(
                'success',
                'Resume Added Successfully'
            );
    }

    public function edit($id)
    {
        $resume = Resume::findOrFail($id);

        return view(
            'admin.resume.edit',
            compact('resume')
        );
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $resume = Resume::findOrFail($id);

        $resume->update($validated);

        return redirect()
            ->route('resume.index')
            ->with(
                'success',
                'Resume Updated Successfully'
            );
    }

    public function delete($id)
    {
        $resume = Resume::findOrFail($id);

        $resume->delete();

        return redirect()
            ->route('resume.index')
            ->with(
                'success',
                'Resume Deleted Successfully'
            );
    }
}
