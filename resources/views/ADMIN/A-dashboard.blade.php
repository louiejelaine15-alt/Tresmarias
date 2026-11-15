@extends('app')

@section('content')

    <div class="welcome-card">
        <h2>
            Welcome, <span id="user-display">Admin</span>!
        </h2>

        <p>
            You have successfully logged in and accessed the admin dashboard.
        </p>
    </div>

    <!-- JAVASCRIPT -->
    <script>
        // Fetch active session user information
        fetch('/api/user')
            .then(res => res.json())
            .then(data => {
                if (data.user) {
                    document.getElementById('user-display').innerText = data.user.username;
                } else {
                    window.location.href = '/login';
                }
            })
            .catch(error => {
                console.error('Error fetching user:', error);
            });
    </script>

@endsection