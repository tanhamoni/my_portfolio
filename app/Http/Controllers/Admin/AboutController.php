<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioSetting;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = PortfolioSetting::first();

        if (!$about) {
            $about = PortfolioSetting::create([]);
        }

        return view('admin.about.index', compact('about'));
    }

    public function update(Request $request)
    {
        $about = PortfolioSetting::first();

        if (!$about) {
            $about = new PortfolioSetting();
        }

        $about->name = $request->name;
        $about->designation = $request->designation;
        $about->about_description = $request->about_description;

        // About Image Upload
        if ($request->hasFile('profile_image')) {

            if (
                $about->about_image &&
                file_exists(public_path('uploads/profile/' . $about->about_image))
            ) {
                unlink(public_path('uploads/profile/' . $about->about_image));
            }

            $image = $request->file('profile_image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads/profile'), $imageName);

            $about->about_image = $imageName;
        }

        $about->save();

        return back()->with('success', 'About Updated Successfully');
    }
}