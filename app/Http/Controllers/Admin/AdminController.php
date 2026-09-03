<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Project;
use App\Models\Skill;
use App\Models\Service;
use App\Models\Timeline;
use App\Models\ContactMessage;
use App\Models\User;

class AdminController extends Controller
{
    // Login Page
    public function adminLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    // Login Submit
    public function adminLoginSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'admin'
        ])) {

            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Invalid Email or Password');
    }



   // Dashboard
    public function dashboard()
    {
        $totalProjects = Project::count();

        $totalSkills = Skill::count();

        $totalServices = Service::count();

        $totalTimeline = Timeline::count();

        $totalMessages = ContactMessage::count();

        $unreadMessages = ContactMessage::where('is_read', false)->count();

        $totalAdmins = User::where('role', 'admin')->count();

        $projects = Project::latest()->take(5)->get();

        $recentMessages = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalProjects',
            'totalSkills',
            'totalServices',
            'totalTimeline',
            'totalMessages',
            'unreadMessages',
            'totalAdmins',
            'projects',
            'recentMessages'
        ));
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}