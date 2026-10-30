<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioSetting;
use App\Services\CloudinaryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

    public function update(
        Request $request,
        CloudinaryService $cloudinary
    ) {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'designation' => 'nullable|string|max:255',
            'about_description' => 'nullable|string',
            'profile_image' =>
            'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $about = PortfolioSetting::first()
            ?? new PortfolioSetting();

        $oldImage = $about->about_image;
        $newImage = null;

        try {
            if ($request->hasFile('profile_image')) {
                $newImage = $cloudinary->upload(
                    $request->file('profile_image'),
                    'portfolio/about'
                );
            }

            $about->name = $validated['name'] ?? null;
            $about->designation =
                $validated['designation'] ?? null;
            $about->about_description =
                $validated['about_description'] ?? null;

            if ($newImage) {
                $about->about_image = $newImage;
            }

            $about->save();
        } catch (\Throwable $e) {
            if ($newImage) {
                try {
                    $cloudinary->delete($newImage);
                } catch (\Throwable $cleanupError) {
                    report($cleanupError);
                }
            }

            report($e);

            return back()->withInput()->with(
                'error',
                'About update failed. Check logs.'
            );
        }

        if ($newImage && $oldImage) {
            try {
                $cloudinary->delete($oldImage);
            } catch (\Throwable $e) {
                Log::warning(
                    'Old About image cleanup failed',
                    ['message' => $e->getMessage()]
                );
            }
        }

        return back()->with(
            'success',
            'About Updated Successfully'
        );
    }
}
