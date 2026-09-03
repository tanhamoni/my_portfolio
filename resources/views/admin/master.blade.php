<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Portfolio Admin</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,Helvetica,sans-serif;
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
}

.sidebar h2{
color:#fff;
text-align:center;
padding:20px;
border-bottom:1px solid rgba(255,255,255,.2);
}

.sidebar ul{
list-style:none;
padding:0;
margin:0;
}

.sidebar ul li a{
display:block;
padding:15px 20px;
color:#fff;
text-decoration:none;
transition:.3s;
}

.sidebar ul li a:hover{
background:#3498db;
}

.content{
margin-left:250px;
}

.topbar{
height:70px;
background:#fff;
display:flex;
justify-content:space-between;
align-items:center;
padding:0 30px;
box-shadow:0 2px 8px rgba(0,0,0,.1);
margin-bottom:25px;
}

.logout-btn{
width:100%;
padding:15px;
background:#e74c3c;
color:#fff;
border:none;
cursor:pointer;
}

    </style>

</head>

<body>

<div class="sidebar">

<h2>Portfolio</h2>

<ul>

<li>
<a href="{{ route('admin.dashboard') }}">
<i class="fa fa-gauge"></i> Dashboard
</a>
</li>

<li>
<a href="{{ route('about.index') }}">
<i class="fa fa-user"></i> About
</a>
</li>

<li>
<a href="{{ route('skills.index') }}">
<i class="fa fa-code"></i> Skills
</a>
</li>

<li>
<a href="{{ route('projects.index') }}">
<i class="fa fa-briefcase"></i> Projects
</a>
</li>

<li>
<a href="{{ route('contact.settings') }}">
<i class="fa fa-address-book"></i> Contact
</a>
</li>

<li>
<a href="{{ route('portfolio.settings') }}">
<i class="fa fa-gear"></i> Portfolio Settings
</a>
</li>

<li>

<form action="{{ route('logout') }}" method="POST">

@csrf

<button class="logout-btn">

<i class="fa fa-right-from-bracket"></i>

Logout

</button>

</form>

</li>

</ul>

</div>

<div class="content">

<div class="topbar">

<h3>@yield('title')</h3>

<h5>Welcome, {{ Auth::user()->name }}</h5>

</div>

<div class="container-fluid">

@yield('content')

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>