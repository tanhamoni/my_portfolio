<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PortfolioSetting;

class PortfolioSettingController extends Controller
{
    // Edit Page
    public function edit()
    {
        $setting = PortfolioSetting::first();

        if (!$setting) {
            $setting = PortfolioSetting::create([]);
        }

        return view('admin.portfolio_setting.edit', compact('setting'));
    }

    // Update Portfolio Setting
    public function update(Request $request)
    {
        $setting = PortfolioSetting::first();

        if (!$setting) {
            $setting = new PortfolioSetting();
        }

        // Hero Section
        $setting->name = $request->name;
        $setting->designation = $request->designation;
        $setting->typed_text = $request->typed_text;
        $setting->hero_description = $request->hero_description;

        // Counter
        $setting->projects_completed = $request->projects_completed;
        $setting->years_experience = $request->years_experience;
        $setting->happy_clients = $request->happy_clients;

        // Social Links
        $setting->facebook = $request->facebook;
        $setting->twitter = $request->twitter;
        $setting->github = $request->github;
      $setting->linkedin = $request->linkedin;
      $setting->whatsapp = $request->whatsapp;

        // Service Cards
        $setting->card_one = $request->card_one;
        $setting->card_two = $request->card_two;
        $setting->card_three = $request->card_three;

        // About Section
        $setting->about_description = $request->about_description;
        $setting->fun_fact = $request->fun_fact;

        // CTA Buttons
        $setting->button_text = $request->button_text;
        $setting->button_link = $request->button_link;
        $setting->resume_button_text = $request->resume_button_text;

        /*
        |--------------------------------------------------------------------------
        | Profile Image Upload
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('profile_image')) {

            if (
                $setting->profile_image &&
                file_exists(public_path('uploads/profile/' . $setting->profile_image))
            ) {
                unlink(public_path('uploads/profile/' . $setting->profile_image));
            }

            $image = $request->file('profile_image');

            $imageName = time() . '_profile.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads/profile'), $imageName);

            $setting->profile_image = $imageName;
        }

        /*
        |--------------------------------------------------------------------------
        | About Image Upload
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('about_image')) {

            if (
                $setting->about_image &&
                file_exists(public_path('uploads/profile/' . $setting->about_image))
            ) {
                unlink(public_path('uploads/profile/' . $setting->about_image));
            }

            $image = $request->file('about_image');

            $imageName = time() . '_about.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads/profile'), $imageName);

            $setting->about_image = $imageName;
        }

        /*
        |--------------------------------------------------------------------------
        | Resume PDF Upload
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('resume_file')) {

            if (
                $setting->resume_file &&
                file_exists(public_path('uploads/resume/' . $setting->resume_file))
            ) {
                unlink(public_path('uploads/resume/' . $setting->resume_file));
            }

            if (!file_exists(public_path('uploads/resume'))) {
                mkdir(public_path('uploads/resume'), 0777, true);
            }

            $pdf = $request->file('resume_file');

            $pdfName = time() . '_resume.' . $pdf->getClientOriginalExtension();

            $pdf->move(public_path('uploads/resume'), $pdfName);

            $setting->resume_file = $pdfName;
        }

        $setting->save();

        return redirect()->back()->with('success', 'Portfolio Settings Updated Successfully.');
    }
}