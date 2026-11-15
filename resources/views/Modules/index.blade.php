@extends('app')

@section('styles')
    <style>
        .modules-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }
        .modules-header h1 {
            margin: 0;
            font-size: 27px;
            color: #263238;
        }
        .btn-group {
            display: flex;
            gap: 12px;
        }
        .btn-primary {
            background: #19a974;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-primary:hover {
            background: #13875d;
        }
        .btn-danger {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-danger:hover {
            background: #c0392b;
        }
        .modules-card {
            background: white;
            border: 1px solid #e1e7ea;
            border-radius: 12px;
            padding: 40px;
            text-align: center;
            color: #7c888e;
        }
    </style>
@endsection

@section('content')

    <div class="modules-header">
        <h1>Manage Modules</h1>
        
        <!-- ONLY ADMIN AND TEACHER WILL SEE THESE BUTTONS -->
        @if(auth()->check() && in_array(auth()->user()->role, ['admin', 'teacher']))
            <div class="btn-group">
                <a href="#" class="btn-primary">
                    <span>➕</span> Add New Module
                </a>
                <button type="button" class="btn-danger">
                    <span>🗑</span> Delete Module
                </button>
            </div>
        @endif
    </div>

    <div class="modules-card">
        <h3>No modules added yet</h3>
        <p style="margin-top: 8px; font-size: 13px;">Learning materials will appear here once published.</p>
    </div>

@endsection