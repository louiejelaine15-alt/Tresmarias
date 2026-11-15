<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPPLMS - Register</title>

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

        .register-container {
            background: white;
            width: 420px;
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

        button {
            width: 100%;
            padding: 12px;
            margin-top: 25px;
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

        .login-link {
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
        }

        .error ul {
            margin: 0;
            padding-left: 15px;
        }
    </style>
</head>
<body>

<div class="register-container">

    <h1>Create Account</h1>
    <p class="subtitle">BPPLMS Student Registration</p>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.process') }}" method="POST">
        @csrf

        <label for="fullname">Full Name</label>
        <input
            type="text"
            id="fullname"
            name="fullname"
            value="{{ old('fullname') }}"
            required
        >

        <label for="email">Gmail / Email Address</label>
        <input
            type="email"
            id="email"
            name="email"
            placeholder="student@gmail.com"
            value="{{ old('email') }}"
            required
        >

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

        <label for="password_confirmation">Confirm Password</label>
        <input
            type="password"
            id="password_confirmation"
            name="password_confirmation"
            required
        >

        <button type="submit">Register & Send Confirmation Code</button>
    </form>

    <div class="login-link">
        Already have an account?
        <a href="{{ route('login') }}">Login</a>
    </div>

</div>

</body>
</html>