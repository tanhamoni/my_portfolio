@extends('frontend.includes.master')
@section('content')
    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">

            <div class="container">
                <div class="row g-0 align-items-center">

                    <div class="col-lg-6 hero-content" data-aos="fade-right" data-aos-delay="100">
                        <div class="content-wrapper">

                            <h1 class="hero-title">
                                Hi,I'm {{ $setting->name }}
                                <span class="typed" data-typed-items="{{ $setting->typed_text }}">
                                </span>
                            </h1>

                            <p class="lead">
                                {{ $setting->hero_description }}
                            </p>

                            <div class="hero-stats" data-aos="fade-up" data-aos-delay="200">

                                <div class="stat-item">
                                    <span class="purecounter" data-purecounter-start="0"
                                        data-purecounter-end="{{ $setting->projects_completed }}"
                                        data-purecounter-duration="2">
                                        0
                                    </span>

                                    <span class="stat-label">
                                        Projects Completed
                                    </span>
                                </div>

                                <div class="stat-item">
                                    <span class="purecounter" data-purecounter-start="0"
                                        data-purecounter-end="{{ $setting->years_experience }}"
                                        data-purecounter-duration="2">
                                        0
                                    </span>

                                    <span class="stat-label">
                                        Years Experience
                                    </span>
                                </div>

                                {{-- <div class="stat-item">
                                    <span class="purecounter" data-purecounter-start="0"
                                        data-purecounter-end="{{ $setting->happy_clients }}" data-purecounter-duration="2">
                                        0
                                    </span>

                                    <span class="stat-label">
                                        Happy Clients
                                    </span>
                                </div> --}}

                            </div>

                            <div class="hero-actions" data-aos="fade-up" data-aos-delay="300">

                                <a href="#portfolio" class="btn btn-primary">
                                    View My Work
                                </a>

                                <a href="#contact" class="btn btn-outline">
                                    Get In Touch
                                </a>

                            </div>

                            <div class="social-links" data-aos="fade-up" data-aos-delay="400">

                                @if ($setting->facebook)
                                    <a href="{{ $setting->facebook }}" target="_blank">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                @endif

                                @if ($setting->twitter)
                                    <a href="{{ $setting->twitter }}" target="_blank">
                                        <i class="bi bi-twitter"></i>
                                    </a>
                                @endif

                                @if ($setting->github)
                                    <a href="{{ $setting->github }}" target="_blank">
                                        <i class="bi bi-github"></i>
                                    </a>
                                @endif

                                @if ($setting->linkedin)
                                    <a href="{{ $setting->linkedin }}" target="_blank">
                                        <i class="bi bi-linkedin"></i>
                                    </a>
                                @endif

             @if ($setting->whatsapp)
    <a href="{{ $setting->whatsapp }}" target="_blank" rel="noopener">
        <i class="bi bi-whatsapp"></i>
    </a>
@endif
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6 hero-image" data-aos="fade-left" data-aos-delay="200">

                        <div class="image-container">

                            <div class="floating-elements">

                                <div class="floating-card card-1" data-aos="zoom-in" data-aos-delay="300">
                                    <i class="bi bi-palette"></i>
                                    <span>{{ $setting->card_one }}</span>
                                </div>

                                <div class="floating-card card-2" data-aos="zoom-in" data-aos-delay="400">
                                    <i class="bi bi-code-slash"></i>
                                    <span>{{ $setting->card_two }}</span>
                                </div>

                                <div class="floating-card card-3" data-aos="zoom-in" data-aos-delay="500">
                                    <i class="bi bi-lightning"></i>
                                    <span>{{ $setting->card_three }}</span>
                                </div>

                            </div>

                            @if ($setting->profile_image)
                                <img src="{{ asset('uploads/profile/' . $setting->profile_image) }}"
                                    alt="{{ $setting->name }}" class="img-fluid hero-main-image">
                            @else
                                <img src="{{ asset('assets/img/profile/pic.jpg') }}" alt="Portfolio Hero"
                                    class="img-fluid hero-main-image">
                            @endif

                            <div class="image-overlay"></div>

                        </div>

                    </div>

                </div>
            </div>

        </section>
        <!-- About Section -->
        <section id="about" class="about section">

            <!-- Section Title -->
            <div class="container section-title">
                <h2>About</h2>
                <p>{{ $setting->designation ?? 'Full Stack Developer' }}</p>
            </div>

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row align-items-center">

                    <div class="col-lg-5" data-aos="fade-right" data-aos-delay="200">

                        <div class="profile-image-wrapper">

                            <div class="profile-image">

                                @if (!empty($setting->about_image))
                                    <img src="{{ asset('uploads/profile/' . $setting->about_image) }}"
                                        alt="{{ $setting->name }}" class="img-fluid">
                                @else
                                    <img src="{{ asset('assets/img/profile/pic.jpg') }}" alt="Profile" class="img-fluid">
                                @endif

                            </div>

                            <div class="signature-section">

                                <img src="{{ asset('assets/img/misc/sin.jpg') }}" alt="Signature" class="signature">

                                <p class="quote">
                                    Building meaningful digital experiences through creative code.
                                </p>

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-7" data-aos="fade-left" data-aos-delay="300">

                        <div class="about-content">

                            <div class="intro">

                                <h2>
                                    Hi, I'm {{ $setting->name ?? 'Tanha Moni' }}
                                </h2>

                                <p>
                                    {{ $setting->about_description ?? '' }}
                                </p>

                            </div>

                            <div class="skills-grid">

                                @foreach ($aboutFeatures as $feature)
                                    <div class="skill-item" data-aos="zoom-in"
                                        data-aos-delay="{{ 400 + $loop->index * 50 }}">

                                        <div class="skill-icon">
                                            <i class="{{ $feature->icon }}"></i>
                                        </div>

                                        <h4>{{ $feature->title }}</h4>

                                        <p>
                                            {{ $feature->description }}
                                        </p>

                                    </div>
                                @endforeach

                            </div>
                            <div class="faq-section" data-aos="fade-up" data-aos-delay="300">

                                <!-- Section Header Start -->
                                <div class="section-header text-center mb-4" style="margin-bottom: 30px;">
                                    <h2 style="font-weight: bold; font-size: 28px;"> Architecture & Answers</h2>
                                    <p style="color: #666; font-size: 15px;">"Strategic insights into my development
                                        process, code quality, and long-term scalability."</p>
                                </div>
                                <!-- Section Header End →

                                       <!-FAQ 01 -->
                                <div class="faq-item">
                                    <div class="faq-question">
                                        <span>01. Why should I choose you over other developers?</span>
                                        <i class="bi bi-plus"></i>
                                    </div>

                                    <div class="faq-answer">
                                        "I don’t just write code; I focus on your business goals.
                                        I build high-performing,lightning-fast and conversion-optimized websites that turn
                                        visitors into paying customers. Plus, you get lifetime clen code structure,
                                        transparent communication and post-launch support that keeps your site stress-free."
                                    </div>
                                </div>


                                <!-- FAQ 02 -->
                                <div class="faq-item">
                                    <div class="faq-question">
                                        <span>02. What is your development process after I place an order?</span>
                                        <i class="bi bi-plus"></i>
                                    </div>

                                    <div class="faq-answer">


                                        <strong>My process is fully transparent and hassle-free:</strong><br><br>

                                        <strong>Phase 1: Research & Planning</strong><br>
                                        (Understanding your requirements, brand and target audience.)

                                        <br><br>

                                        <strong>Phase 2: Wireframing & Design</strong><br>
                                        (Creating the layout and design according to your requirements.)

                                        <br><br>

                                        <strong>Phase 3: Development & Testing</strong><br>
                                        (Developing the website with Laravel, PHP, MySQL and modern
                                        web technologies while testing responsiveness and functionality.)

                                        <br><br>

                                        <strong>Phase 4: Review & Launch</strong><br>
                                        (Making final adjustments and deploying the completed website.)
                                    </div>
                                </div>


                                <!-- FAQ 03 -->
                                <div class="faq-item">
                                    <div class="faq-question">
                                        <span>03. Will I be able to update the website easily after it is finished?</span>
                                        <i class="bi bi-plus"></i>
                                    </div>

                                    <div class="faq-answer">
                                        "Yes, absolutely! I can build the website with a user-friendly
                                        Laravel admin panel so you can easily manage content such as
                                        text, images, projects, products and other information without
                                        needing to edit the code directly."
                                    </div>
                                </div>


                                <!-- FAQ 04 -->
                                <div class="faq-item">
                                    <div class="faq-question">
                                        <span>04. Do you provide support after the website goes live?</span>
                                        <i class="bi bi-plus"></i>
                                    </div>

                                    <div class="faq-answer">
                                        "Yes! I offer 30 days of free support after delivery to help fix bugs, make minor
                                        adjustments, and resolve technical issues. Beyond that, I’m also available for
                                        long-term maintenance and support as your business grows."
                                    </div>
                                </div>


                                <!-- FAQ 05 -->
                                <div class="faq-item">
                                    <div class="faq-question">
                                        <span>05. What happens if my business grows and I need to add new features or scale
                                            the website later?</span>
                                        <i class="bi bi-plus"></i>
                                    </div>

                                    <div class="faq-answer">
                                        "I build websites with future expansion in mind. The Laravel
                                        architecture and code structure can be organized in a modular
                                        and scalable way, making it easier to add new features later,
                                        such as advanced booking, additional product features,
                                        payment integrations or other custom functionality."
                                    </div>
                                </div>

                            </div>

                            <div class="cta-section" data-aos="fade-up" data-aos-delay="400">

                                <div class="fun-fact">

                                    <span class="emoji">🚀</span>

                                    <span class="text">
                                        {{ $setting->fun_fact ?? 'Code-driven learner based in Bhola' }}
                                    </span>

                                </div>

                                <div class="action-buttons">

                                    <a href="{{ $setting->button_link ?? '#portfolio' }}" class="btn btn-primary">

                                        {{ $setting->button_text ?? 'View My Work' }}

                                    </a>

                                    @if (!empty($setting->resume_file))
                                        <a href="{{ asset('uploads/resume/' . $setting->resume_file) }}"
                                            class="btn btn-outline" target="_blank">

                                            <i class="bi bi-file-earmark-pdf"></i>
                                            {{ $setting->resume_button_text ?? 'View Resume' }}

                                        </a>
                                    @endif

                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </section>

        <section id="skills" class="skills section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                @php
                    $frontendSkills = $skills->where('category', 'Frontend');
                    $backendSkills = $skills->where('category', 'Backend');
                @endphp

                <div class="skills-grid">

                    <div class="row g-4">

                        <!-- Frontend -->
                        <div class="col-lg-6">

                            <div class="skill-card">

                                <div class="skill-header">

                                    <i class="bi bi-code-slash"></i>

                                    <h3>Frontend Development</h3>

                                </div>

                                @foreach ($frontendSkills as $skill)
                                    <div class="skill-item">

                                        <div class="skill-info">

                                            <span class="skill-name">
                                                {{ $skill->name }}
                                            </span>

                                            <span class="skill-percentage">
                                                {{ $skill->percentage }}%
                                            </span>

                                        </div>

                                        <div class="skill-bar">

                                            <div class="progress-bar" role="progressbar"
                                                aria-valuenow="{{ $skill->percentage }}" aria-valuemin="0"
                                                aria-valuemax="100" style="width: {{ $skill->percentage }}%;">
                                            </div>

                                        </div>

                                    </div>
                                @endforeach

                            </div>

                        </div>

                        <!-- Backend -->
                        <div class="col-lg-6">

                            <div class="skill-card">

                                <div class="skill-header">

                                    <i class="bi bi-server"></i>

                                    <h3>Backend Development</h3>

                                </div>

                                @foreach ($backendSkills as $skill)
                                    <div class="skill-item">

                                        <div class="skill-info">

                                            <span class="skill-name">
                                                {{ $skill->name }}
                                            </span>

                                            <span class="skill-percentage">
                                                {{ $skill->percentage }}%
                                            </span>

                                        </div>

                                        <div class="skill-bar">

                                            <div class="progress-bar" role="progressbar"
                                                aria-valuenow="{{ $skill->percentage }}" aria-valuemin="0"
                                                aria-valuemax="100" style="width: {{ $skill->percentage }}%;">
                                            </div>

                                        </div>

                                    </div>
                                @endforeach

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>
        <!-- Resume Section -->
        <section id="resume" class="resume section">

            <!-- Section Title -->
            <div class="container section-title">
                <h2>Resume</h2>
                <p>
                    Showcasing a journey of professional growth, technical skill acquisition,
                    and a commitment to excellence in every project.
                </p>
            </div>

            <div class="container">

                <div class="row">

                    <div class="col-lg-12" data-aos="fade-left" data-aos-delay="200">

                        <div class="education-section">

                            <div class="section-header">
                                <h2>
                                    <i class="bi bi-mortarboard"></i>
                                    Academic Excellence
                                </h2>

                                <p class="section-subtitle">
                                    A reflection of my dedication to learning and mastering the principles
                                    of technology through rigorous academic study.
                                </p>
                            </div>

                            <div class="education-timeline">

                                <div class="timeline-track"></div>

                                @foreach ($resumes as $resume)
                                    <div class="education-item" data-aos="slide-up">

                                        <div class="timeline-marker"></div>

                                        <div class="education-content">

                                            <div class="degree-header">

                                                <h3>{{ $resume->title }}</h3>

                                                <span class="year">
                                                    {{ $resume->year }}
                                                </span>

                                            </div>

                                            <h4 class="institution">
                                                {{ $resume->institution }}
                                            </h4>

                                            <p>
                                                {{ $resume->description }}
                                            </p>

                                        </div>

                                    </div>
                                @endforeach

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!-- Services Section -->
        <section id="services" class="services section">

            <!-- Section Title -->
            <div class="container section-title">
                <h2>Services</h2>
                <p>
                    I am a person who loves to learn new things and solve problems.
                    I enjoy working on creative projects and always try to improve my skills.
                    Furthermore, I am a hardworking individual who values teamwork and stays
                    positive even in challenging situations.
                </p>
            </div>

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-4">

                    @foreach ($services as $service)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">

                            <div class="service-item">

                                <div class="icon">
                                    <i class="{{ $service->icon }}"></i>
                                </div>

                                <h3>{{ $service->title }}</h3>

                                <p>{{ $service->description }}</p>

                                <div class="card-links">
                                    <a href="#contact" class="link-item">
                                        Contact Me
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>

                            </div>

                        </div>
                    @endforeach

                </div>

            </div>

        </section>
        <!-- =======================
                         Portfolio Section
                    ======================= -->
        <!-- Portfolio Section -->
        <section id="portfolio" class="my-portfolio section py-5">

            <div class="container">

                <!-- Heading -->
                <div class="text-center mb-5" data-aos="fade-up">

                    <span class="small text-primary fw-bold text-uppercase">
                        My Work
                    </span>

                    <h2 class="display-5 fw-bold mt-2">
                        Featured Projects
                    </h2>

                    <p class="text-muted col-lg-7 mx-auto">
                        A collection of my recent Laravel, PHP and Full Stack Development projects.
                    </p>

                </div>


                <!-- Projects -->
                <div class="row g-4">

                    @foreach ($projects as $project)
                        <div class="col-lg-4 col-md-6">

                            <!-- Project Box -->
                            <div class="project-box"
                                style="
                            background: #ffffff;
                            border: 3px solid #0d6efd;
                            border-radius: 20px;
                            padding: 10px;
                            box-shadow: 0 10px 30px rgba(13,110,253,0.20);
                            margin-bottom: 25px;
                            height: 100%;
                            transition: all 0.3s ease;
                        ">

                                <!-- Project Image -->
                                <div class="project-thumb"
                                    style="
                                border-radius: 15px;
                                overflow: hidden;
                            ">

                                    <img src="{{ asset('uploads/projects/' . $project->image) }}"
                                        alt="{{ $project->title }}" class="img-fluid"
                                        style="width:100%; display:block;">

                                    <!-- Overlay -->
                                    <div class="project-overlay">

                                        @if ($project->github)
                                            <a href="{{ $project->github }}" target="_blank">

                                                <i class="bi bi-github"></i>

                                            </a>
                                        @endif


                                        @if ($project->live)
                                            <a href="{{ $project->live }}" target="_blank">

                                                <i class="bi bi-box-arrow-up-right"></i>

                                            </a>
                                        @endif

                                    </div>

                                </div>


                                <!-- Project Content -->
                                <div class="project-content">

                                    <!-- Category -->
                                    <span class="project-tag">

                                        {{ $project->category }}

                                    </span>


                                    <!-- Title -->
                                    <h3>

                                        {{ $project->title }}

                                    </h3>


                                    <!-- Technology -->
                                    <div class="project-tech">

                                        {{ $project->technology }}

                                    </div>


                                    <!-- Description -->
                                    <p>

                                        {{ $project->description }}

                                    </p>


                                    <!-- Buttons -->
                                    <div class="project-buttons">

                                        @if ($project->github)
                                            <a href="{{ $project->github }}" target="_blank"
                                                class="btn btn-dark btn-sm">

                                                <i class="bi bi-github"></i>

                                                Github

                                            </a>
                                        @endif


                                        @if ($project->live)
                                            <a href="{{ $project->live }}" target="_blank"
                                                class="btn btn-primary btn-sm">

                                                <i class="bi bi-box-arrow-up-right"></i>

                                                Live Demo

                                            </a>
                                        @endif

                                    </div>

                                </div>

                            </div>

                        </div>
                    @endforeach

                </div>

            </div>

        </section>

        <!-- Contact Section -->
        <section id="contact" class="contact section light-background">

            <!-- Section Title -->
            <div class="container section-title">
                <h2>Contact</h2>
                <p>Let's build something amazing together! Whether you have a question about a project or just want to say
                    hi, my inbox is always open.</p>
            </div>

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-4 g-lg-5">

                    <!-- Contact Info -->
                    <div class="col-lg-5">
                        <div class="info-box" data-aos="fade-up" data-aos-delay="200">

                            <h3>Contact Info</h3>

                            <p>
                                {{ $contact->contact_description ?? 'Feel free to contact me anytime.' }}
                            </p>

                            <!-- Location -->
                            <div class="info-item">
                                <div class="icon-box">
                                    <i class="bi bi-geo-alt"></i>
                                </div>

                                <div class="content">
                                    <h4>Location</h4>

                                    <p>{{ $contact->location ?? '' }}</p>

                                    <p>{{ $contact->country ?? '' }}</p>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="info-item">
                                <div class="icon-box">
                                    <i class="bi bi-telephone"></i>
                                </div>

                                <div class="content">
                                    <h4>Phone Number</h4>

                                    <p>{{ $contact->phone ?? '' }}</p>

                                    @if ($contact && $contact->phone2)
                                        <p>{{ $contact->phone2 }}</p>
                                    @endif

                                </div>
                            </div>

                            <!-- Email -->
                            <div class="info-item">
                                <div class="icon-box">
                                    <i class="bi bi-envelope"></i>
                                </div>

                                <div class="content">
                                    <h4>Email Address</h4>

                                    <p>{{ $contact->email ?? '' }}</p>

                                    @if ($contact && $contact->email2)
                                        <p>{{ $contact->email2 }}</p>
                                    @endif

                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="col-lg-7">

                        <div class="contact-form">

                            <h3>{{ $contact->form_title ?? 'Get In Touch' }}</h3>

                            <p>
                                {{ $contact->form_description ?? 'Send me a message and I will reply as soon as possible.' }}
                            </p>

                            <form action="{{ route('contact.send') }}" method="POST">

                                @csrf

                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="row gy-4">

                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Your Name" value="{{ old('name') }}" required>
                                    </div>

                                    <div class="col-md-6">
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Your Email" value="{{ old('email') }}" required>
                                    </div>

                                    <div class="col-12">
                                        <input type="text" name="subject" class="form-control" placeholder="Subject"
                                            value="{{ old('subject') }}" required>
                                    </div>

                                    <div class="col-12">
                                        <textarea name="message" class="form-control" rows="6" placeholder="Message" required>{{ old('message') }}</textarea>
                                    </div>

                                    <div class="col-12 text-center">

                                        <button type="submit" class="btn">
                                            Send Message
                                        </button>

                                    </div>

                                </div>

                            </form>
                        </div>

                    </div>

                </div>

            </div>

        </section>

    </main>
@endsection
