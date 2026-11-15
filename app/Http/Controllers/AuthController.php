<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\VerificationCodeMail;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('Login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            // Check if student account is verified via email
            if ($user->role === 'student' && !$user->is_verified) {
                Auth::logout();
                return back()->withErrors([
                    'username' => 'Please verify your email address before logging in.',
                ])->withInput();
            }

            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'username' => 'Invalid username or password.',
        ])->withInput();
    }

    public function showRegister()
    {
        return view('signup');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'email'    => 'required|email|max:255|unique:users,email',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|min:8|confirmed',
        ]);

        // Generate a 6-digit confirmation code
        $code = rand(100000, 999999);

        $user = User::create([
            'fullname'          => $validated['fullname'],
            'email'             => $validated['email'],
            'username'          => $validated['username'],
            'password'          => Hash::make($validated['password']),
            'role'              => 'student',
            'verification_code' => $code,
            'is_verified'       => false,
        ]);

        // Safely send confirmation code via Gmail SMTP with exception handling
        try {
            Mail::to($user->email)->send(new VerificationCodeMail($code, $user->fullname));
        } catch (\Exception $e) {
            Log::error("SMTP Mail Error: " . $e->getMessage());
            Log::info("Fallback Verification code for {$user->email}: {$code}");
        }

        // Save user ID in session to verify on the next page
        session(['verify_user_id' => $user->id]);

        return redirect()->route('verify.show');
    }

    public function showVerify()
    {
        if (!session()->has('verify_user_id')) {
            return redirect()->route('register');
        }
        return view('auth.verify');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'code' => 'required|numeric'
        ]);

        $userId = session('verify_user_id');
        $user = User::find($userId);

        if ($user && (string) $user->verification_code === (string) $request->code) {
            $user->is_verified = true;
            $user->verification_code = null;
            $user->save();

            session()->forget('verify_user_id');
            Auth::login($user);

            return redirect()->route('dashboard');
        }

        // Log mismatch details for debugging
        Log::warning("Verification failed. Submitted: [{$request->code}] vs Expected: [" . ($user?->verification_code ?? 'null') . "]");

        return back()->with('error', 'Invalid verification code. Please try again.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}