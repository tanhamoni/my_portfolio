<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#f4f6f9;
        }

        .sidebar{
            width:250px;
            height:100vh;
            background:#2c3e50;
            position:fixed;
            left:0;
            top:0;
            overflow-y:auto;
        }

        .sidebar h2{
            color:#fff;
            text-align:center;
            padding:20px;
            border-bottom:1px solid rgba(255,255,255,.15);
            font-weight:bold;
        }

        .sidebar ul{
            list-style:none;
            padding:0;
            margin:0;
        }

        .sidebar ul li a{
            display:block;
            color:#fff;
            text-decoration:none;
            padding:15px 20px;
            transition:.3s;
            position:relative;
        }

        .sidebar ul li a:hover{
            background:#3498db;
        }

        .sidebar ul li a i{
            width:22px;
        }

        .sidebar .badge{
            position:absolute;
            right:20px;
            top:50%;
            transform:translateY(-50%);
        }

        .logout-btn{
            width:100%;
            border:none;
            background:#e74c3c;
            color:#fff;
            padding:15px;
            cursor:pointer;
            font-size:15px;
        }

        .logout-btn:hover{
            background:#c0392b;
        }

        .content{
            margin-left:250px;
            min-height:100vh;
        }

        .topbar{
            height:70px;
            background:#fff;
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:0 30px;
            box-shadow:0 2px 8px rgba(0,0,0,.08);
        }

        .main-content{
            padding:30px;
        }

        .card{
            border:none;
            box-shadow:0 2px 10px rgba(0,0,0,.08);
        }

        .table th,
        .table td{
            vertical-align:middle;
        }

        .img-thumbnail{
            border-radius:8px;
        }

        @media(max-width:768px){

            .sidebar{
                display:none;
            }

            .content{
                margin-left:0;
            }

        }
    </style>

    @stack('css')
</head>

<body>

@php
    $unreadCount = \App\Models\ContactMessage::where('is_read',0)->count();
@endphp

<div class="sidebar">

    <h2>Portfolio</h2>

    <ul>

        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="fas fa-gauge"></i> Dashboard
            </a>
        </li>

        <li>
            <a href="{{ route('about.index') }}">
                <i class="fas fa-user"></i> About
            </a>
        </li>


<li>
    <a href="{{ route('about-features.index') }}">
        <i class="fas fa-layer-group"></i> About Features
    </a>
</li>
        <li>
            <a href="{{ route('skills.index') }}">
                <i class="fas fa-code"></i> Skills
            </a>
        </li>

        <li>
            <a href="{{ route('resume.index') }}">
                <i class="fas fa-graduation-cap"></i> Resume
            </a>
        </li>


<li>
    <a href="{{ route('timeline.index') }}">
        <i class="fas fa-stream"></i> Timeline
    </a>
</li>
        <li>
            <a href="{{ route('services.index') }}">
                <i class="fas fa-cogs"></i> Services
            </a>
        </li>

        <li>
            <a href="{{ route('projects.index') }}">
                <i class="fas fa-briefcase"></i> Projects
            </a>
        </li>

        <li>
            <a href="{{ route('contact.settings') }}">
                <i class="fas fa-address-book"></i> Contact
            </a>
        </li>

        <li>
            <a href="{{ route('messages.index') }}">
                <i class="fas fa-envelope"></i>
                Messages

                @if($unreadCount > 0)
                    <span class="badge badge-danger">
                        {{ $unreadCount }}
                    </span>
                @endif
            </a>
        </li>

        <li>
            <a href="{{ route('portfolio.settings') }}">
                <i class="fas fa-cog"></i> Portfolio Settings
            </a>
        </li>

        <li>

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button class="logout-btn">

                    <i class="fas fa-right-from-bracket"></i>

                    Logout

                </button>

            </form>

        </li>

    </ul>

</div>

<div class="content">

    <div class="topbar">

        <h3>@yield('page-title')</h3>

        <h5 class="mb-0">
            Welcome, {{ Auth::user()->name }}
        </h5>

    </div>

    <div class="main-content">

        @yield('content')

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

@stack('js')

</body>
</html>