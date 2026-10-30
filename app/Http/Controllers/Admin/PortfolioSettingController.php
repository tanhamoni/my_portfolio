<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioSetting;
use App\Services\CloudinaryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PortfolioSettingController extends Controller
{
    public function edit()
    {
        $setting = PortfolioSetting::first();

        if (!$setting) {
            $setting = PortfolioSetting::create([]);
        }

        return view(
            'admin.portfolio_setting.edit',
            compact('setting')
        );
    }

    public function update(
        Request $request,
        CloudinaryService $cloudinary
    ) {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'designation' => 'nullable|string|max:255',
            'typed_text' => 'nullable|string',
            'hero_description' => 'nullable|string',

            'projects_completed' => 'nullable|integer|min:0',
            'years_experience' => 'nullable|numeric|min:0',
            'happy_clients' => 'nullable|integer|min:0',

            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'github' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'whatsapp' => 'nullable|string|max:255',

            'card_one' => 'nullable|string',
            'card_two' => 'nullable|string',
            'card_three' => 'nullable|string',

            'about_description' => 'nullable|string',
            'fun_fact' => 'nullable|string',

            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'resume_button_text' => 'nullable|string|max:255',

            'profile_image' =>
            'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'about_image' =>
            'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'resume_file' =>
            'nullable|file|mimes:pdf|max:5120',
        ]);

        $setting = PortfolioSetting::first()
            ?? new PortfolioSetting();

        $oldFiles = [
            'profile_image' => $setting->profile_image,
            'about_image' => $setting->about_image,
            'resume_file' => $setting->resume_file,
        ];

        $newFiles = [];

        try {
            if ($request->hasFile('profile_image')) {
                $newFiles['profile_image'] =
                    $cloudinary->upload(
                        $request->file('profile_image'),
                        'portfolio/profile'
                    );
            }

            if ($request->hasFile('about_image')) {
                $newFiles['about_image'] =
                    $cloudinary->upload(
                        $request->file('about_image'),
                        'portfolio/about'
                    );
            }

            if ($request->hasFile('resume_file')) {
                $newFiles['resume_file'] =
                    $cloudinary->upload(
                        $request->file('resume_file'),
                        'portfolio/resumes',
                        'raw'
                    );
            }

            // Preserve all existing settings fields.
            $fields = [
                'name',
                'designation',
                'typed_text',
                'hero_description',
                'projects_completed',
                'years_experience',
                'happy_clients',
                'facebook',
                'twitter',
                'github',
                'linkedin',
                'whatsapp',
                'card_one',
                'card_two',
                'card_three',
                'about_description',
                'fun_fact',
                'button_text',
                'button_link',
                'resume_button_text',
            ];

            foreach ($fields as $field) {
                $setting->{$field} = $validated[$field] ?? null;
            }

            foreach ($newFiles as $field => $url) {
                $setting->{$field} = $url;
            }

            $setting->save();
        } catch (\Throwable $e) {
            foreach ($newFiles as $field => $url) {
                try {
                    $type = $field === 'resume_file'
                        ? 'raw'
                        : 'image';

                    $cloudinary->delete($url, $type);
                } catch (\Throwable $cleanupError) {
                    report($cleanupError);
                }
            }

            report($e);

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Portfolio update failed. Check logs.'
                );
        }

        // Delete old Cloudinary files only after DB save.
        foreach ($newFiles as $field => $url) {
            $oldUrl = $oldFiles[$field] ?? null;

            if (!$oldUrl) {
                continue;
            }

            try {
                $type = $field === 'resume_file'
                    ? 'raw'
                    : 'image';

                $cloudinary->delete($oldUrl, $type);
            } catch (\Throwable $e) {
                Log::warning(
                    'Old portfolio file cleanup failed',
                    [
                        'field' => $field,
                        'message' => $e->getMessage(),
                    ]
                );
            }
        }

        return redirect()
            ->back()
            ->with(
                'success',
                'Portfolio Settings Updated Successfully.'
            );
    }
}
