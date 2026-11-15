<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPPLMS - Instructor Portal</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7f9;
            color: #263238;
        }

        /* TOP HEADER */
        .top-header {
            background: #ffffff;
            height: 75px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 35px;
            border-bottom: 1px solid #e2e8eb;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 22px;
            font-weight: bold;
            color: #1677a8;
        }

        .brand-icon {
            width: 42px;
            height: 38px;
            border-radius: 10px;
            background: #19a974;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #555;
        }

        .profile-circle {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #dce9ef;
            color: #1677a8;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
        }

        /* LAYOUT */
        .layout {
            display: flex;
            min-height: calc(100vh - 75px);
        }

        /* SIDEBAR */
        .sidebar {
            width: 220px;
            background: #ffffff;
            border-right: 1px solid #e1e6e9;
            padding: 25px 15px;
            flex-shrink: 0;
        }

        .sidebar a,
        .logout-button {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 14px;
            text-decoration: none;
            color: #66747c;
            padding: 14px 15px;
            margin-bottom: 8px;
            border-radius: 8px;
            font-size: 14px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #e5f5fb;
            color: #087db3;
        }

        .sidebar-icon {
            width: 28px;
            text-align: center;
            font-size: 17px;
        }

        .logout-button {
            border: none;
            background: none;
            cursor: pointer;
            text-align: left;
        }

        .logout-button:hover {
            background: #fff0ef;
            color: #c0392b;
        }

        /* MAIN CONTENT AREA */
        .main {
            flex: 1;
            padding: 30px;
            max-width: 1400px;
        }

        /* Allow role pages to push custom inline styles if needed */
        @yield('styles')
    </style>
</head>

<body>

    <!-- TOP HEADER -->
    <header class="top-header">
        <div class="brand">
            <div class="brand-icon">BPP</div>
            BPPLMS
        </div>

        <div class="profile">
            <div class="profile-circle">
                {{ strtoupper(substr(Auth::user()->fullname ?? 'U', 0, 1)) }}
            </div>
            <span>
                {{ Auth::user()->fullname ?? 'User' }}
            </span>
        </div>
    </header>

    <div class="layout">

        <!-- SIDEBAR -->
        <aside class="sidebar">
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <span class="sidebar-icon">⌂</span>
                Overview
            </a>

            <a href="{{ route('modules.index') }}" class="{{ request()->routeIs('modules.*') ? 'active' : '' }}">
                <span class="sidebar-icon">▣</span>
                Modules
            </a>

            <a href="#">
                <span class="sidebar-icon">✓</span>
                Quizzes
            </a>

            <a href="#">
                <span class="sidebar-icon">▤</span>
                Grades
            </a>

            <a href="#">
                <span class="sidebar-icon">▦</span>
                Reports
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-button">
                    <span class="sidebar-icon">↪</span>
                    Logout
                </button>
            </form>
        </aside>

        <!-- MAIN CONTENT CONTAINER -->
        <main class="main">
            @yield('content')
        </main>

    </div>

</body>
</html>