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
            margin-top: 7px;
            color: #7b878d;
        }
        .stats {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr;
            gap: 20px;
            margin-bottom: 25px;
        }
        .card {
            background: white;
            border: 1px solid #e2e8eb;
            border-radius: 12px;
            padding: 22px;
        }
        .progress-card {
            display: flex;
            align-items: center;
            gap: 25px;
        }
        .progress-circle {
            width: 125px;
            height: 125px;
            border-radius: 50%;
            background: conic-gradient(
                #08a6df 0deg 230deg,
                #dcecf2 230deg 360deg
            );
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .progress-inner {
            width: 95px;
            height: 95px;
            border-radius: 50%;
            background: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .progress-inner strong {
            font-size: 22px;
            color: #1677a8;
        }
        .progress-inner span {
            font-size: 11px;
            color: #89949a;
        }
        .progress-info h3 {
            margin: 0 0 8px;
            font-size: 15px;
            color: #65727a;
        }
        .goal-number {
            font-size: 30px;
            font-weight: bold;
            color: #263238;
        }
        .goal-label {
            font-size: 13px;
            color: #8a959b;
        }
        .progress-bar {
            margin-top: 15px;
            height: 9px;
            background: #e8edf0;
            border-radius: 20px;
            overflow: hidden;
        }
        .progress-fill {
            width: 68%;
            height: 100%;
            background: #19a974;
        }
        .stat-title {
            color: #7c888e;
            font-size: 14px;
            margin-bottom: 10px;
        }
        .stat-number {
            font-size: 29px;
            font-weight: bold;
            color: #263238;
        }
        .stat-description {
            color: #89949a;
            font-size: 13px;
            margin-top: 5px;
        }
        .content-grid {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 20px;
        }
        .section-title {
            font-size: 17px;
            margin: 0 0 18px;
            color: #37474f;
        }
        .lesson {
            display: flex;
            gap: 20px;
        }
        .lesson-image {
            width: 220px;
            height: 125px;
            background: linear-gradient(135deg, #faedcd, #d4a373);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 38px;
            flex-shrink: 0;
        }
        .lesson-info {
            flex: 1;
        }
        .lesson-info h3 {
            margin: 0 0 8px;
            color: #37474f;
        }
        .lesson-info p {
            margin: 0 0 15px;
            color: #7b878d;
            font-size: 13px;
        }
        .continue-btn {
            display: inline-block;
            padding: 10px 22px;
            background: #19a974;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
        }
        .continue-btn:hover {
            background: #13875d;
        }
        .activity {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 0;
            border-bottom: 1px solid #edf0f2;
        }
        .activity:last-child {
            border-bottom: none;
        }
        .activity-icon {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: #e2f6ed;
            color: #19a974;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .activity-info {
            flex: 1;
        }
        .activity-info strong {
            display: block;
            font-size: 13px;
            color: #263238;
        }
        .activity-info span {
            color: #929ca1;
            font-size: 12px;
        }
        .activity-score {
            font-weight: bold;
            color: #19a974;
        }

        @media(max-width: 1000px) {
            .stats, .content-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection

@section('content')

    <div class="welcome">
        <h1>
            Welcome, {{ Auth::user()->fullname ?? 'Student' }}
        </h1>
        <p>
            Here's your Bread and Pastry Production learning progress.
        </p>
    </div>

    <!-- STAT CARDS -->
    <div class="stats">

        <!-- PROGRESS -->
        <div class="card progress-card">
            <div class="progress-circle">
                <div class="progress-inner">
                    <strong>68%</strong>
                    <span>Progress</span>
                </div>
            </div>

            <div class="progress-info">
                <h3>Your Baking Progress</h3>
                <div class="goal-number">68%</div>
                <div class="goal-label">Overall Course Progress</div>
                <div class="progress-bar">
                    <div class="progress-fill"></div>
                </div>
            </div>
        </div>

        <!-- MODULES -->
        <div class="card">
            <div class="stat-title">Modules Completed</div>
            <div class="stat-number">6</div>
            <div class="stat-description">Out of 10 modules</div>
        </div>

        <!-- QUIZZES -->
        <div class="card">
            <div class="stat-title">Theory Average</div>
            <div class="stat-number">85%</div>
            <div class="stat-description">Based on completed quizzes</div>
        </div>

    </div>

    <!-- LOWER CONTENT -->
    <div class="content-grid">

        <!-- CURRENT LESSON -->
        <div class="card">
            <h2 class="section-title">Current Lesson</h2>

            <div class="lesson">
                <div class="lesson-image">
                    🍞
                </div>

                <div class="lesson-info">
                    <h3>Commercial Bread Making Techniques</h3>
                    <p>
                        Learn fundamental mixing, kneading, proofing, and baking concepts for your BPP class.
                    </p>
                    <a href="{{ route('modules.index') }}" class="continue-btn">
                        Continue Learning
                    </a>
                </div>
            </div>
        </div>

        <!-- RECENT ACTIVITY -->
        <div class="card">
            <h2 class="section-title">Recent Activity</h2>

            <div class="activity">
                <div class="activity-icon">✓</div>
                <div class="activity-info">
                    <strong>Completed Quiz</strong>
                    <span>Baking Ingredients & Measurements</span>
                </div>
                <div class="activity-score">90%</div>
            </div>

            <div class="activity">
                <div class="activity-icon">✓</div>
                <div class="activity-info">
                    <strong>Completed Module</strong>
                    <span>Sanitation and Safety Practices</span>
                </div>
                <div class="activity-score">Done</div>
            </div>

            <div class="activity">
                <div class="activity-icon">✓</div>
                <div class="activity-info">
                    <strong>Quiz Completed</strong>
                    <span>Yeast Fermentation Basics</span>
                </div>
                <div class="activity-score">85%</div>
            </div>
        </div>

    </div>

@endsection