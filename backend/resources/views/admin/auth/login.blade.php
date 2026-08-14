<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login - IP Software Technologies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            min-height: 100vh;
            display: flex;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #0B1120;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(29, 170, 216, 0.08) 0%, transparent 60%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .login-left {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px;
            position: relative;
            z-index: 10;
        }

        .login-left .logo-wrap {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-left .logo-wrap img {
            width: 100px;
            height: auto;
            margin-bottom: 20px;
        }

        .login-left .logo-wrap h2 {
            color: #fff;
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .login-left .logo-wrap h2 span {
            color: #ED8F28;
        }

        .login-left .logo-wrap p {
            color: rgba(255, 255, 255, 0.5);
            font-size: 14px;
            max-width: 280px;
            line-height: 1.6;
        }

        .login-left .features {
            margin-top: 30px;
            list-style: none;
        }

        .login-left .features li {
            color: rgba(255, 255, 255, 0.6);
            font-size: 13px;
            padding: 8px 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .login-left .features li i {
            color: #1DAAD8;
            font-size: 14px;
            width: 20px;
            text-align: center;
        }

        .login-divider {
            width: 1px;
            background: rgba(255, 255, 255, 0.1);
            position: relative;
            z-index: 10;
        }

        .login-right {
            width: 480px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            position: relative;
            z-index: 10;
        }

        .login-card {
            width: 100%;
            max-width: 380px;
        }

        .login-card h3 {
            color: #fff;
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .login-card .subtitle {
            color: rgba(255, 255, 255, 0.5);
            font-size: 14px;
            margin-bottom: 28px;
        }

        .form-group {
            margin-bottom: 18px;
            position: relative;
        }

        .form-group label {
            display: block;
            color: rgba(255, 255, 255, 0.7);
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 6px;
        }

        .form-group .input-wrapper {
            position: relative;
        }

        .form-group .input-wrapper i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.4);
            font-size: 15px;
        }

        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 11px 14px 11px 42px;
            background: rgba(255, 255, 255, 0.07);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 10px;
            color: #fff;
            font-size: 14px;
            transition: all 0.3s ease;
            outline: none;
        }

        .form-group input:focus {
            border-color: #1DAAD8;
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 0 3px rgba(29, 170, 216, 0.2);
        }

        .form-group input::placeholder {
            color: rgba(255, 255, 255, 0.35);
        }

        .remember-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 22px;
        }

        .remember-row label {
            display: flex;
            align-items: center;
            gap: 8px;
            color: rgba(255, 255, 255, 0.6);
            font-size: 13px;
            cursor: pointer;
        }

        .remember-row input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: #1DAAD8;
            cursor: pointer;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #1DAAD8, #ED8F28);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(29, 170, 216, 0.4);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .alert-error {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #fca5a5;
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 13px;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-error i { font-size: 16px; }

        .login-footer {
            text-align: center;
            margin-top: 25px;
            color: rgba(255, 255, 255, 0.3);
            font-size: 12px;
        }

        @media (max-width: 991px) {
            body { flex-direction: column; }
            .login-left { padding: 30px 20px 20px; }
            .login-left .features { display: none; }
            .login-divider { width: 100%; height: 1px; }
            .login-right { width: 100%; padding: 20px 30px 30px; }
        }
    </style>
</head>
<body>
    <div class="login-left">
        <div class="logo-wrap">
            <img src="{{ asset('images/logo.png') }}" alt="IP Software Technologies">
            <h2>IP Software <span>Technologies</span></h2>
            <p>Manage your website content, projects, and team from one powerful admin panel.</p>
        </div>
        <ul class="features">
            <li><i class="fas fa-check-circle"></i> Content Management System</li>
            <li><i class="fas fa-check-circle"></i> Project & Portfolio Manager</li>
            <li><i class="fas fa-check-circle"></i> Team & Career Management</li>
            <li><i class="fas fa-check-circle"></i> SEO & Website Settings</li>
            <li><i class="fas fa-check-circle"></i> Contact Message Inbox</li>
        </ul>
    </div>

    <div class="login-divider"></div>

    <div class="login-right">
        <div class="login-card">
            <h3>Welcome Back</h3>
            <p class="subtitle">Sign in to your admin panel</p>

            @if($errors->any())
                <div class="alert-error">
                    <i class="fas fa-exclamation-triangle"></i>
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.post') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                </div>

                <div class="remember-row">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        Remember me
                    </label>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i> Sign In
                </button>
            </form>

            <div class="login-footer">
                &copy; {{ date('Y') }} IP Software Technologies. All rights reserved.
            </div>
        </div>
    </div>
</body>
</html>
