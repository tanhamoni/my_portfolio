<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ResumeController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PortfolioSettingController;
use App\Http\Controllers\Admin\ContactSettingController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\TimelineController;
use App\Http\Controllers\Admin\AboutFeatureController;  

/*
|--------------------------------------------------------------------------
| Frontend
|--------------------------------------------------------------------------
*/

Route::get('/', [FrontendController::class, 'index'])->name('home');

Route::post('/contact-send', [ContactController::class, 'store'])
    ->name('contact.send');

/*
|--------------------------------------------------------------------------
| Admin Login
|--------------------------------------------------------------------------
*/

Route::get('/admin-login', [AdminController::class, 'adminLogin'])->name('admin.login');
Route::post('/admin-login', [AdminController::class, 'adminLoginSubmit'])->name('admin.login.submit');

/*
|--------------------------------------------------------------------------
| Protected Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    /*
    |--------------------------------------------------------------------------
    | About
    |--------------------------------------------------------------------------
    */

    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::post('/about/update', [AboutController::class, 'update'])->name('about.update');




// About Features
Route::get('/about-features', [AboutFeatureController::class, 'index'])->name('about-features.index');

Route::get('/about-features/create', [AboutFeatureController::class, 'create'])->name('about-features.create');

Route::post('/about-features/store', [AboutFeatureController::class, 'store'])->name('about-features.store');

Route::get('/about-features/edit/{id}', [AboutFeatureController::class, 'edit'])->name('about-features.edit');

Route::post('/about-features/update/{id}', [AboutFeatureController::class, 'update'])->name('about-features.update');

Route::get('/about-features/delete/{id}', [AboutFeatureController::class, 'delete'])->name('about-features.delete');
    /*
    |--------------------------------------------------------------------------
    | Skills
    |--------------------------------------------------------------------------
    */

    Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');
    Route::get('/skills/create', [SkillController::class, 'create'])->name('skills.create');
    Route::post('/skills/store', [SkillController::class, 'store'])->name('skills.store');
    Route::get('/skills/edit/{id}', [SkillController::class, 'edit'])->name('skills.edit');
    Route::post('/skills/update/{id}', [SkillController::class, 'update'])->name('skills.update');
    Route::get('/skills/delete/{id}', [SkillController::class, 'delete'])->name('skills.delete');

    /*
    |--------------------------------------------------------------------------
    | Resume
    |--------------------------------------------------------------------------
    */

    Route::get('/resume', [ResumeController::class, 'index'])->name('resume.index');
    Route::get('/resume/create', [ResumeController::class, 'create'])->name('resume.create');
    Route::post('/resume/store', [ResumeController::class, 'store'])->name('resume.store');
    Route::get('/resume/edit/{id}', [ResumeController::class, 'edit'])->name('resume.edit');
    Route::post('/resume/update/{id}', [ResumeController::class, 'update'])->name('resume.update');
    Route::get('/resume/delete/{id}', [ResumeController::class, 'delete'])->name('resume.delete');


    /*
|--------------------------------------------------------------------------
| Timeline
|--------------------------------------------------------------------------
*/

Route::get('/timeline', [TimelineController::class, 'index'])
    ->name('timeline.index');

Route::get('/timeline/create', [TimelineController::class, 'create'])
    ->name('timeline.create');

Route::post('/timeline/store', [TimelineController::class, 'store'])
    ->name('timeline.store');

Route::get('/timeline/edit/{id}', [TimelineController::class, 'edit'])
    ->name('timeline.edit');

Route::post('/timeline/update/{id}', [TimelineController::class, 'update'])
    ->name('timeline.update');

Route::get('/timeline/delete/{id}', [TimelineController::class, 'destroy'])
    ->name('timeline.delete');

    /*
    |--------------------------------------------------------------------------
    | Services
    |--------------------------------------------------------------------------
    */

    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/services/store', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/edit/{id}', [ServiceController::class, 'edit'])->name('services.edit');
    Route::post('/services/update/{id}', [ServiceController::class, 'update'])->name('services.update');
    Route::get('/services/delete/{id}', [ServiceController::class, 'delete'])->name('services.delete');

    /*
    |--------------------------------------------------------------------------
    | Projects
    |--------------------------------------------------------------------------
    */

    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects/store', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/edit/{id}', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::post('/projects/update/{id}', [ProjectController::class, 'update'])->name('projects.update');
    Route::get('/projects/delete/{id}', [ProjectController::class, 'delete'])->name('projects.delete');

    /*
    |--------------------------------------------------------------------------
    | Portfolio Settings
    |--------------------------------------------------------------------------
    */

    Route::get('/portfolio-settings', [PortfolioSettingController::class, 'edit'])
        ->name('portfolio.settings');

    Route::post('/portfolio-settings/update', [PortfolioSettingController::class, 'update'])
        ->name('portfolio.settings.update');

    /*
    |--------------------------------------------------------------------------
    | Contact Settings
    |--------------------------------------------------------------------------
    */

    Route::get('/contact-settings', [ContactSettingController::class, 'index'])
        ->name('contact.settings');

    Route::post('/contact-settings/update', [ContactSettingController::class, 'update'])
        ->name('contact.settings.update');


        // Message.....................

        Route::get('/messages', [ContactMessageController::class, 'index'])
    ->name('messages.index');

Route::get('/messages/show/{id}', [ContactMessageController::class, 'show'])
    ->name('messages.show');

Route::get('/messages/delete/{id}', [ContactMessageController::class, 'delete'])
    ->name('messages.delete');

});










Route::get('/fix-db', function () {
    \Illuminate\Support\Facades\Artisan::call('migrate:fresh --seed --force');
    return "Database table created successfully!";
});