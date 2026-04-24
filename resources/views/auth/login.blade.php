{{-- ============================================ --}}
{{-- FILE: resources/views/auth/login.blade.php --}}
{{-- ============================================ --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - PT. Mitra Data Abadi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Crimson Text', 'Times New Roman', serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            overflow: hidden;
            max-width: 450px;
            width: 100%;
        }
        .login-header {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .login-body {
            padding: 40px;
        }
        .btn-login {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            border: none;
            padding: 12px;
            font-size: 18px;
            font-weight: bold;
        }
        .btn-login:hover {
            background: linear-gradient(135deg, #c82333 0%, #bd2130 100%);
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-header">
            <div class="mb-3">
                <div class="d-inline-block bg-white rounded-circle p-3">
                    <svg width="50" height="50" viewBox="0 0 50 50" fill="none">
                        <text x="25" y="35" text-anchor="middle" fill="#dc3545" font-size="30" font-weight="bold">M</text>
                    </svg>
                </div>
            </div>
            <h2 class="mb-0">PT. Mitra Data Abadi</h2>
            <p class="mb-0">Admin Panel Login</p>
        </div>
        
        <div class="login-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Error!</strong> {{ $errors->first() }}
                    </div>
                @endif

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                           name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                           name="password" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            Remember Me
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block btn-login">
                    Login
                </button>

                <div class="text-center mt-3">
                    <a href="{{ route('password.request') }}" class="text-muted">Forgot Your Password?</a>
                </div>

                <hr class="my-4">

                <div class="text-center">
                    <small class="text-muted">
                        <strong>Default Login:</strong><br>
                        Email: hr@mitradata.com<br>
                        Password: password123
                    </small>
                </div>

                <div class="text-center mt-3">
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-sm">
                        ← Back to Website
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>