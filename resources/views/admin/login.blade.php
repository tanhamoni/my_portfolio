<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{
            display:flex;
            justify-content:center;
            align-items:center;
            min-height:100vh;
            background:linear-gradient(135deg,#00c6ff,#0072ff);
        }

        .login-box{
            width:400px;
            background:#fff;
            padding:40px;
            border-radius:15px;
            box-shadow:0 15px 35px rgba(0,0,0,.2);
        }

        .login-box h2{
            text-align:center;
            margin-bottom:30px;
            color:#333;
        }

        .form-group{
            margin-bottom:18px;
        }

        .form-group label{
            display:block;
            margin-bottom:6px;
            color:#555;
            font-size:14px;
        }

        .form-control{
            width:100%;
            padding:13px;
            border:1px solid #ddd;
            border-radius:8px;
            outline:none;
            font-size:15px;
        }

        .form-control:focus{
            border-color:#0072ff;
        }

        .btn{
            width:100%;
            padding:13px;
            border:none;
            border-radius:8px;
            background:#0072ff;
            color:#fff;
            font-size:16px;
            cursor:pointer;
            transition:.3s;
        }

        .btn:hover{
            background:#005ad4;
        }

        .alert-success{
            background:#d4edda;
            color:#155724;
            padding:10px;
            border-radius:6px;
            margin-bottom:15px;
        }

        .alert-danger{
            background:#f8d7da;
            color:#721c24;
            padding:10px;
            border-radius:6px;
            margin-bottom:15px;
        }

        .footer{
            margin-top:20px;
            text-align:center;
            color:#888;
            font-size:13px;
        }
    </style>
</head>

<body>

<div class="login-box">

    <h2>Admin Login</h2>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert-danger">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('admin.login.submit') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Email Address</label>
            <input type="email"
                   name="email"
                   class="form-control"
                   value="{{ old('email') }}"
                   placeholder="Enter your email"
                   required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password"
                   name="password"
                   class="form-control"
                   placeholder="Enter your password"
                   required>
        </div>

        <button type="submit" class="btn">
            Login
        </button>

    </form>

    <div class="footer">
        © {{ date('Y') }} Portfolio Admin Panel
    </div>

</div>

</body>
</html>