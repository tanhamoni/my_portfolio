<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('serial', 'asc')->get();

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'description' => 'required',
            'serial' => 'required|numeric',
        ]);

        Service::create([
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
            'serial' => $request->serial,
        ]);

        return redirect()->route('services.index')
            ->with('success', 'Service Added Successfully');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);

        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'description' => 'required',
            'serial' => 'required|numeric',
        ]);

        $service = Service::findOrFail($id);

        $service->update([
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
            'serial' => $request->serial,
        ]);

        return redirect()->route('services.index')
            ->with('success', 'Service Updated Successfully');
    }

    public function delete($id)
    {
        Service::findOrFail($id)->delete();

        return redirect()->route('services.index')
            ->with('success', 'Service Deleted Successfully');
    }
}
