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
        return view('admin.resume.index', compact('resumes'));
    }

    public function create()
    {
        return view('admin.resume.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'institution' => 'required',
            'year' => 'required',
            'description' => 'required',
        ]);

        Resume::create($request->all());

        return redirect()->route('resume.index')
            ->with('success', 'Resume Added Successfully');
    }

    public function edit($id)
    {
        $resume = Resume::findOrFail($id);

        return view('admin.resume.edit', compact('resume'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'institution' => 'required',
            'year' => 'required',
            'description' => 'required',
        ]);

        $resume = Resume::findOrFail($id);

        $resume->update($request->all());

        return redirect()->route('resume.index')
            ->with('success', 'Resume Updated Successfully');
    }

    public function delete($id)
    {
        Resume::findOrFail($id)->delete();

        return redirect()->route('resume.index')
            ->with('success', 'Resume Deleted Successfully');
    }
}