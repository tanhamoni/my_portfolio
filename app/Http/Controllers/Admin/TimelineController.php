<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Timeline;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function index()
    {
        $timelines = Timeline::orderBy('serial', 'asc')->get();

        return view('admin.timeline.index', compact('timelines'));
    }

    public function create()
    {
        return view('admin.timeline.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required|max:50',
            'title' => 'required|max:255',
            'description' => 'required',
            'serial' => 'required|integer',
        ]);

        Timeline::create($request->all());

        return redirect()->route('timeline.index')
            ->with('success', 'Timeline added successfully.');
    }

    public function edit($id)
    {
        $timeline = Timeline::findOrFail($id);

        return view('admin.timeline.edit', compact('timeline'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'year' => 'required|max:50',
            'title' => 'required|max:255',
            'description' => 'required',
            'serial' => 'required|integer',
        ]);

        $timeline = Timeline::findOrFail($id);

        $timeline->update($request->all());

        return redirect()->route('timeline.index')
            ->with('success', 'Timeline updated successfully.');
    }

    public function destroy($id)
    {
        Timeline::findOrFail($id)->delete();

        return redirect()->route('timeline.index')
            ->with('success', 'Timeline deleted successfully.');
    }
}