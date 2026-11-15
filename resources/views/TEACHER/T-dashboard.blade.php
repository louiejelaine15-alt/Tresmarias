@extends('app')

@section('styles')
    <style>
        .welcome {
            margin-bottom: 25px;
        }
        .welcome h1 {
            margin: 0;
            font-size: 27px;
            color: #263238;
        }
        .welcome p {
            color: #7c888e;
            margin-top: 7px;
        }
        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }
        .card {
            background: white;
            border: 1px solid #e1e7ea;
            border-radius: 12px;
            padding: 22px;
        }
        .stat-title {
            color: #7c888e;
            font-size: 14px;
            margin-bottom: 10px;
        }
        .stat-number {
            font-size: 30px;
            font-weight: bold;
            color: #263238;
        }
        .stat-description {
            color: #909ba0;
            font-size: 13px;
            margin-top: 5px;
        }
        .content-grid {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 20px;
        }
        .section-title {
            margin: 0 0 18px;
            font-size: 17px;
            color: #37474f;
        }
        .pending-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 0;
            border-bottom: 1px solid #edf0f2;
        }
        .pending-item:last-child {
            border-bottom: none;
        }
        .pending-info strong {
            display: block;
            font-size: 14px;
            color: #263238;
        }
        .pending-info span {
            color: #8c979c;
            font-size: 12px;
        }
        .status {
            padding: 6px 10px;
            border-radius: 5px;
            font-size: 11px;
        }
        .status.pending {
            background: #fff3cd;
            color: #856404;
        }
        .status.completed {
            background: #e2f6ed;
            color: #16875a;
        }
        .management-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
        .management-card {
            border: 1px solid #e5eaed;
            border-radius: 8px;
            padding: 18px;
            text-decoration: none;
            color: #37474f;
            display: block;
            transition: 0.2s;
        }
        .management-card:hover {
            border-color: #1b91bd;
            transform: translateY(-2px);
        }
        .management-icon {
            font-size: 25px;
            margin-bottom: 10px;
        }
        .management-card h3 {
            margin: 0 0 5px;
            font-size: 14px;
        }
        .management-card p {
            margin: 0;
            font-size: 12px;
            color: #89949a;
            line-height: 1.5;
        }
    </style>
@endsection

@section('content')

    <div class="welcome">
        <h1>
            Welcome, {{ Auth::user()->fullname ?? 'Instructor' }}
        </h1>
        <p>
            Manage your Bread and Pastry Production classes, baking modules, practical evaluations, and student grades.
        </p>
    </div>

    <!-- STATISTICS -->
    <div class="stats">
        <div class="card">
            <div class="stat-title">Average Practical Score</div>
            <div class="stat-number">88%</div>
            <div class="stat-description">Current baking performance</div>
        </div>

        <div class="card">
            <div class="stat-title">Pending Submissions</div>
            <div class="stat-number">10</div>
            <div class="stat-description">Recipe outputs to evaluate</div>
        </div>

        <div class="card">
            <div class="stat-title">Total Trainees</div>
            <div class="stat-number">115</div>
            <div class="stat-description">Students enrolled in BPP</div>
        </div>
    </div>

    <!-- LOWER CONTENT -->
    <div class="content-grid">

        <!-- PENDING ACTIVITY -->
        <div class="card">
            <h2 class="section-title">Pending Practical Outputs</h2>

            <div class="pending-item">
                <div class="pending-info">
                    <strong>Commercial Bread Baking Lab</strong>
                    <span>Practical evaluation</span>
                </div>
                <span class="status pending">Pending</span>
            </div>

            <div class="pending-item">
                <div class="pending-info">
                    <strong>Pastry Decorating Assessment</strong>
                    <span>Skill submission</span>
                </div>
                <span class="status pending">Pending</span>
            </div>

            <div class="pending-item">
                <div class="pending-info">
                    <strong>Basic Yeast Products Module</strong>
                    <span>Learning module</span>
                </div>
                <span class="status completed">Published</span>
            </div>
        </div>

        <!-- MANAGEMENT -->
        <div class="card">
            <h2 class="section-title">Course Management</h2>

            <div class="management-grid">
                <a href="{{ route('modules.index') }}" class="management-card">
                    <div class="management-icon">🍞</div>
                    <h3>Baking Modules</h3>
                    <p>Upload and manage recipes and pastry guides.</p>
                </a>

                <a href="#" class="management-card">
                    <div class="management-icon">📝</div>
                    <h3>Quizzes</h3>
                    <p>Create and manage theory assessments.</p>
                </a>

                <a href="#" class="management-card">
                    <div class="management-icon">❓</div>
                    <h3>Questions</h3>
                    <p>Add and edit baking theory questions.</p>
                </a>

                <a href="#" class="management-card">
                    <div class="management-icon">📊</div>
                    <h3>Grades</h3>
                    <p>Manage practical scores and grades.</p>
                </a>
            </div>
        </div>

    </div>

@endsection