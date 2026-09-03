<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::latest()->get();

        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'name' => 'required',
            'percentage' => 'required|numeric|min:0|max:100',
        ]);

        Skill::create([
            'category' => $request->category,
            'name' => $request->name,
            'percentage' => $request->percentage,
        ]);

        return redirect()->route('skills.index')
            ->with('success', 'Skill Added Successfully');
    }

    public function edit($id)
    {
        $skill = Skill::findOrFail($id);

        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required',
            'name' => 'required',
            'percentage' => 'required|numeric|min:0|max:100',
        ]);

        $skill = Skill::findOrFail($id);

        $skill->update([
            'category' => $request->category,
            'name' => $request->name,
            'percentage' => $request->percentage,
        ]);

        return redirect()->route('skills.index')
            ->with('success', 'Skill Updated Successfully');
    }

    public function delete($id)
    {
        Skill::findOrFail($id)->delete();

        return redirect()->route('skills.index')
            ->with('success', 'Skill Deleted Successfully');
    }
}