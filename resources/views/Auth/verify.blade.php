<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPPLMS - Verify Email</title>

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

        .verify-container {
            background: white;
            width: 420px;
            max-width: 90%;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #1e3a5f;
            margin-bottom: 5px;
        }

        .subtitle {
            color: #777;
            margin-bottom: 25px;
            font-size: 13px;
            line-height: 1.4;
        }

        input {
            width: 100%;
            padding: 14px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 18px;
            text-align: center;
            letter-spacing: 4px;
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

        .error {
            color: #c0392b;
            font-size: 13px;
            margin-bottom: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="verify-container">

    <h1>Verify Email</h1>
    <p class="subtitle">We've sent a 6-digit confirmation code to your Gmail address. Enter it below to activate your account.</p>

    @if (session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('verify.process') }}" method="POST">
        @csrf

        <input 
            type="text" 
            name="code" 
            placeholder="000000" 
            maxlength="6" 
            pattern="\d{6}"
            value="{{ old('code') }}"
            required
            autofocus
        >

        <button type="submit">Verify & Continue</button>
    </form>

</div>

</body>
</html>