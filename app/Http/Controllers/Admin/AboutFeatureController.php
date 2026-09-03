<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutFeature;
use Illuminate\Http\Request;

class AboutFeatureController extends Controller
{
    // List
    public function index()
    {
        $features = AboutFeature::orderBy('serial', 'asc')->get();

        return view('admin.about_feature.index', compact('features'));
    }

    // Create
    public function create()
    {
        return view('admin.about_feature.create');
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|max:100',
            'title' => 'required|max:255',
            'description' => 'required',
            'serial' => 'required|integer',
        ]);

        AboutFeature::create($request->all());

        return redirect()->route('about-features.index')
            ->with('success', 'Feature Added Successfully.');
    }

    // Edit
    public function edit($id)
    {
        $feature = AboutFeature::findOrFail($id);

        return view('admin.about_feature.edit', compact('feature'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'icon' => 'required|max:100',
            'title' => 'required|max:255',
            'description' => 'required',
            'serial' => 'required|integer',
        ]);

        $feature = AboutFeature::findOrFail($id);

        $feature->update($request->all());

        return redirect()->route('about-features.index')
            ->with('success', 'Feature Updated Successfully.');
    }

    // Delete
    public function delete($id)
    {
        $feature = AboutFeature::findOrFail($id);

        $feature->delete();

        return redirect()->back()
            ->with('success', 'Feature Deleted Successfully.');
    }
}