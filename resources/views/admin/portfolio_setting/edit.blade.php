@extends('admin.layouts.app')

@section('title', 'Portfolio Settings')

@section('page-title', 'Portfolio Settings')

@section('content')

    <div class="container-fluid">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('portfolio.settings.update') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <!-- Hero Section -->
            <div class="card shadow mb-4">

                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-home"></i> Hero Section
                    </h5>
                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label><b>Name</b></label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $setting->name) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label><b>Designation</b></label>
                            <input type="text" name="designation" class="form-control"
                                value="{{ old('designation', $setting->designation) }}">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label><b>Typed Text</b></label>
                            <input type="text" name="typed_text" class="form-control"
                                value="{{ old('typed_text', $setting->typed_text) }}">

                            <small class="text-muted">
                                Example : Web Developer, Laravel Developer, Freelancer
                            </small>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label><b>Hero Description</b></label>

                            <textarea name="hero_description" rows="4" class="form-control">{{ old('hero_description', $setting->hero_description) }}</textarea>
                        </div>

                    </div>

                </div>

            </div>

            <!-- Counter -->

            <div class="card shadow mb-4">

                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-chart-line"></i> Counter
                    </h5>
                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-4">
                            <label><b>Projects</b></label>

                            <input type="number" name="projects_completed" class="form-control"
                                value="{{ old('projects_completed', $setting->projects_completed) }}">
                        </div>

                        <div class="col-md-4">
                            <label><b>Experience</b></label>

                            <input type="number" name="years_experience" class="form-control"
                                value="{{ old('years_experience', $setting->years_experience) }}">
                        </div>

                        <div class="col-md-4">
                            <label><b>Happy Clients</b></label>

                            <input type="number" name="happy_clients" class="form-control"
                                value="{{ old('happy_clients', $setting->happy_clients) }}">
                        </div>

                    </div>

                </div>

            </div>

            <!-- Social -->

            <div class="card shadow mb-4">

    <div class="card-header bg-info text-white">
        <h5 class="mb-0">
            <i class="fas fa-share-alt"></i> Social Links
        </h5>
    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Facebook</label>
                <input type="text" name="facebook" class="form-control"
                    value="{{ old('facebook', $setting->facebook) }}">
            </div>

            <div class="col-md-6 mb-3">
                <label>Twitter</label>
                <input type="text" name="twitter" class="form-control"
                    value="{{ old('twitter', $setting->twitter) }}">
            </div>

            <div class="col-md-6 mb-3">
                <label>Github</label>
                <input type="text" name="github" class="form-control"
                    value="{{ old('github', $setting->github) }}">
            </div>

            <div class="col-md-6 mb-3">
                <label>LinkedIn</label>
                <input type="text" name="linkedin" class="form-control"
                    value="{{ old('linkedin', $setting->linkedin) }}">
            </div>

            <div class="col-md-6 mb-3">
                <label>WhatsApp</label>
                <input type="text" name="whatsapp" class="form-control"
                    value="{{ old('whatsapp', $setting->whatsapp) }}"
                    placeholder="https://wa.me/8801XXXXXXXXX">
            </div>

        </div>

    </div>

</div>

            <!-- About -->

            <div class="card shadow mb-4">

                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">
                        <i class="fas fa-user"></i> About Section
                    </h5>
                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-12 mb-3">

                            <label>About Description</label>

                            <textarea name="about_description" rows="5" class="form-control">{{ old('about_description', $setting->about_description) }}</textarea>

                        </div>

                        <div class="col-md-6">

                            <label>Profile Image</label>

                            <input type="file" name="profile_image" class="form-control">

                            @if ($setting->profile_image)
                                <img src="{{ asset('uploads/profile/' . $setting->profile_image) }}" width="120"
                                    class="mt-2 rounded">
                            @endif

                        </div>

                        <div class="col-md-6">

                            <label>About Image</label>

                            <input type="file" name="about_image" class="form-control">

                            @if ($setting->about_image)
                                <img src="{{ asset('uploads/profile/' . $setting->about_image) }}" width="120"
                                    class="mt-2 rounded">
                            @endif

                        </div>

                    </div>

                </div>

            </div>

            <!-- CTA -->

            <div class="card shadow mb-4">

                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-bullhorn"></i> CTA Section
                    </h5>
                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-12 mb-3">

                            <label>Fun Fact</label>

                            <input type="text" name="fun_fact" class="form-control"
                                value="{{ old('fun_fact', $setting->fun_fact) }}">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label>Primary Button Text</label>

                            <input type="text" name="button_text" class="form-control"
                                value="{{ old('button_text', $setting->button_text) }}">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label>Primary Button Link</label>

                            <input type="text" name="button_link" class="form-control"
                                value="{{ old('button_link', $setting->button_link) }}">

                        </div>

                        <div class="col-md-6">

                            <label>Resume Button Text</label>

                            <input type="text" name="resume_button_text" class="form-control"
                                value="{{ old('resume_button_text', $setting->resume_button_text) }}">

                        </div>

                        <div class="col-md-6">

                            <label>Resume PDF</label>

                            <input type="file" name="resume_file" class="form-control">

                            @if ($setting->resume_file)
                                <a href="{{ asset('uploads/resume/' . $setting->resume_file) }}" target="_blank"
                                    class="btn btn-success mt-2">

                                    View Current Resume

                                </a>
                            @endif

                        </div>

                    </div>

                </div>

            </div>

            <button class="btn btn-primary btn-lg">
                <i class="fas fa-save"></i>
                Update Portfolio Settings
            </button>

        </form>

    </div>

@endsection
