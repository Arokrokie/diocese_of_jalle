<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Portal Login - Diocese of Jalle</title>
  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/font-awesome.min.css') }}">
  <style>
    body {
      background: linear-gradient(135deg, #1b2530 0%, #2b3a4a 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      padding: 20px;
    }
    .login-card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 15px 35px rgba(0,0,0,0.25);
      width: 100%;
      max-width: 440px;
      overflow: hidden;
    }
    .login-header {
      background-color: #2b3a4a;
      color: #fff;
      padding: 30px 25px;
      text-align: center;
      position: relative;
    }
    .login-header img {
      max-height: 70px;
      margin-bottom: 12px;
    }
    .login-header h4 {
      margin: 0;
      font-weight: 700;
      font-size: 20px;
      letter-spacing: 0.5px;
    }
    .login-header p {
      margin: 5px 0 0;
      font-size: 13px;
      color: #cbd5e0;
    }
    .login-body {
      padding: 30px 25px;
    }
    .form-control:focus {
      border-color: #2b3a4a;
      box-shadow: 0 0 0 0.25rem rgba(43, 58, 74, 0.15);
    }
    .btn-login {
      background-color: #2b3a4a;
      color: #fff;
      font-weight: 600;
      padding: 12px;
      border-radius: 6px;
      transition: all 0.2s ease;
    }
    .btn-login:hover {
      background-color: #1b2530;
      color: #fff;
    }
  </style>
</head>
<body>
  <div class="login-card">
    <div class="login-header">
      <img src="{{ asset('assets/img/diocese/crest_transparent.png') }}" alt="Diocese of Jalle">
      <h4>Diocese of Jalle</h4>
      <p>Episcopal Church of South Sudan • Admin Access</p>
    </div>
    <div class="login-body">
      @if(session('status'))
        <div class="alert alert-info small py-2">
          {{ session('status') }}
        </div>
      @endif

      @if($errors->any())
        <div class="alert alert-danger small py-2">
          {{ $errors->first() }}
        </div>
      @endif

      <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label fw-semibold text-secondary small">EMAIL ADDRESS</label>
          <div class="input-group">
            <span class="input-group-text"><i class="far fa-envelope text-muted"></i></span>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="admin@dioceseofjalle.org" required autofocus>
          </div>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label fw-semibold text-secondary small">PASSWORD</label>
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-lock text-muted"></i></span>
            <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
          </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label small text-muted" for="remember">
              Remember me
            </label>
          </div>
          <a href="{{ route('home') }}" class="small text-decoration-none text-muted">Back to site</a>
        </div>

        <button type="submit" class="btn btn-login w-100 mb-3">
          <i class="fas fa-sign-in-alt me-2"></i> Log In to Portal
        </button>
      </form>
    </div>
  </div>
</body>
</html>
