<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPPLMS - Login</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #eef3f8;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: white;
            width: 400px;
            max-width: 90%;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #1e3a5f;
            margin-bottom: 5px;
        }

        .subtitle {
            text-align: center;
            color: #777;
            margin-bottom: 25px;
            font-size: 13px;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 6px;
            font-weight: bold;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        .row-between {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            font-size: 13px;
        }

        .captcha-box {
            background: #f4f7f9;
            padding: 10px 12px;
            border-radius: 6px;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 15px;
        }

        .captcha-text {
            font-weight: bold;
            color: #1e3a5f;
            letter-spacing: 2px;
            font-size: 15px;
        }

        .captcha-box input {
            width: 100px;
            padding: 6px;
            text-align: center;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background: #1e3a5f;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #162c47;
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            color: #aaa;
            margin: 20px 0;
            font-size: 12px;
        }

        .divider::before, .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e1e7ea;
        }

        .divider::before {
            margin-right: 10px;
        }

        .divider::after {
            margin-left: 10px;
        }

        .btn-google {
            width: 100%;
            padding: 11px;
            background: white;
            color: #444;
            border: 1px solid #ccc;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
        }

        .btn-google:hover {
            background: #f8f9fa;
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        a {
            color: #1e3a5f;
            text-decoration: none;
            font-weight: bold;
        }

        .error {
            color: #c0392b;
            font-size: 13px;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="login-container">

    <h1>BPPLMS</h1>
    <p class="subtitle">Bread and Pastry Production Learning Management System</p>

    @if ($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login.process') }}" method="POST">
        @csrf

        <label for="username">Username</label>
        <input
            type="text"
            id="username"
            name="username"
            value="{{ old('username') }}"
            required
        >

        <label for="password">Password</label>
        <input
            type="password"
            id="password"
            name="password"
            required
        >

        <div class="row-between">
            <span></span>
            <a href="#" style="font-size: 12px; color: #666;">Forgot Password?</a>
        </div>

        <!-- Math CAPTCHA Widget -->
        <label for="captcha">Security Verification</label>
        <div class="captcha-box">
            <span class="captcha-text">7 + 4 =</span>
            <input type="text" name="captcha" placeholder="Answer" required>
        </div>

        <button type="submit">Login</button>
    </form>

    <div class="divider">OR</div>

    <!-- Login with Google button placeholder -->
    <a href="#" class="btn-google">
        <svg width="18" height="18" viewBox="0 0 24 24"><path fill="#4285F4" d="M23.745 12.27c0-.7-.06-1.4-.19-2.07H12v4.51h6.6c-.29 1.52-1.14 2.82-2.4 3.68v3.05h3.88c2.27-2.09 3.66-5.17 3.66-9.17z"/><path fill="#34A853" d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.88-3.05c-1.08.72-2.45 1.16-4.05 1.16-3.13 0-5.78-2.11-6.73-4.96H1.18v3.15C3.15 21.32 7.22 24 12 24z"/><path fill="#FBBC05" d="M5.27 14.24c-.25-.72-.38-1.49-.38-2.24s.13-1.52.38-2.24V6.61H1.18C.43 8.13 0 9.83 0 12s.43 3.87 1.18 5.39l4.09-3.15z"/><path fill="#EA4335" d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C17.95 1.19 15.24 0 12 0 7.22 0 3.15 2.68 1.18 6.61l4.09 3.15c.95-2.85 3.6-4.96 6.73-4.96z"/></svg>
        Sign in with Google
    </a>

    <div class="register-link">
        Don't have an account? <a href="{{ route('register') }}">Register</a>
    </div>

</div>

</body>
</html>