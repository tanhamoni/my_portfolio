<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PortfolioSetting;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Resume;
use App\Models\Service;
use App\Models\ContactSetting;
use App\Models\Timeline;
use App\Models\AboutFeature;

class FrontendController extends Controller
{
    public function index()
    {
        $setting = PortfolioSetting::first();

        $projects = Project::orderBy('serial', 'asc')->get();

        $skills = Skill::orderBy('category', 'asc')->get();

        $resumes = Resume::latest()->get();

        $services = Service::orderBy('serial', 'asc')->get();

        $contact = ContactSetting::first();

        $timelines = Timeline::orderBy('serial', 'asc')->get();

        $aboutFeatures = AboutFeature::orderBy('serial', 'asc')->get();

        return view('frontend.home', compact(
            'setting',
            'projects',
            'skills',
            'resumes',
            'services',
            'contact',
            'timelines',
            'aboutFeatures'
        ));
    }

    public function adminLogin()
    {
        return view('frontend.login');
    }
}