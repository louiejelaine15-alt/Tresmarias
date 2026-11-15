<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $dashboardTitle = match ($user->role) {
            'admin'   => 'Admin Dashboard',
            'teacher' => 'Teacher Dashboard',
            default   => 'Student Dashboard',
        };

        return match ($user->role) {
            'admin'   => view('ADMIN.A-dashboard', compact('user', 'dashboardTitle')),
            'teacher' => view('TEACHER.T-dashboard', compact('user', 'dashboardTitle')),
            default   => view('STUDENT.S-dashboard', compact('user', 'dashboardTitle')),
        };
    }
}