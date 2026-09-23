<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Admin Dashboard') - Diocese of Jalle Portal</title>
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
  <!-- TinyMCE Rich Text Editor -->
  <script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      if (typeof tinymce !== 'undefined') {
        tinymce.init({
          selector: 'textarea.rich-editor',
          plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime table help wordcount',
          toolbar: 'undo redo | blocks | bold italic underline forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | table link | code fullscreen',
          menubar: 'file edit view insert format tools table',
          height: 380,
          branding: false,
          promotion: false,
          content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif; font-size: 15px; line-height: 1.6; color: #333; }',
          setup: function(editor) {
            editor.on('change keyup paste input', function() {
              editor.save();
            });
          }
        });

        // Always trigger TinyMCE save before form submission
        document.querySelectorAll('form').forEach(function(form) {
          form.addEventListener('submit', function() {
            if (typeof tinymce !== 'undefined') {
              tinymce.triggerSave();
            }
          });
        });
      }
    });
  </script>
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/font-awesome.min.css') }}">
  <style>
    :root {
      --primary-color: #2b3a4a;
      --primary-dark: #1b2530;
      --accent-color: #d4a373;
      --sidebar-width: 260px;
    }
    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
      background-color: #f4f6f9;
      color: #333;
      min-height: 100vh;
      margin: 0;
    }
    .admin-wrapper {
      display: flex;
      min-height: 100vh;
    }
    .admin-sidebar {
      width: var(--sidebar-width);
      background-color: var(--primary-dark);
      color: #fff;
      flex-shrink: 0;
      display: flex;
      flex-direction: column;
      transition: all 0.3s ease;
    }
    .sidebar-brand {
      padding: 20px;
      display: flex;
      align-items: center;
      gap: 12px;
      background-color: rgba(0,0,0,0.15);
      border-bottom: 1px solid rgba(255,255,255,0.08);
      text-decoration: none;
      color: #fff;
    }
    .sidebar-brand img {
      max-height: 44px;
    }
    .sidebar-brand-text h6 {
      margin: 0;
      font-size: 15px;
      font-weight: 700;
      letter-spacing: 0.5px;
      color: #fff;
    }
    .sidebar-brand-text small {
      font-size: 11px;
      color: #a0aec0;
      display: block;
    }
    .sidebar-menu {
      padding: 15px 0;
      flex-grow: 1;
      list-style: none;
      margin: 0;
    }
    .menu-header {
      padding: 10px 20px 5px;
      font-size: 11px;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: #718096;
      font-weight: 600;
    }
    .sidebar-menu a {
      display: flex;
      align-items: center;
      padding: 12px 20px;
      color: #cbd5e0;
      text-decoration: none;
      font-size: 14px;
      font-weight: 500;
      transition: all 0.2s ease;
      gap: 12px;
    }
    .sidebar-menu a i {
      width: 20px;
      text-align: center;
      font-size: 16px;
    }
    .sidebar-menu a:hover {
      background-color: rgba(255,255,255,0.06);
      color: #fff;
      border-left: 4px solid var(--accent-color);
      padding-left: 16px;
    }
    .sidebar-menu a.active {
      background-color: #2b3a4a;
      color: #fff;
      border-left: 4px solid var(--accent-color);
      font-weight: 600;
    }
    .sidebar-menu .badge {
      margin-left: auto;
    }
    .sidebar-footer {
      padding: 15px 20px;
      border-top: 1px solid rgba(255,255,255,0.08);
      font-size: 12px;
      color: #a0aec0;
    }
    .admin-main {
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      min-width: 0;
    }
    .admin-topbar {
      background-color: #fff;
      height: 65px;
      border-bottom: 1px solid #e2e8f0;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 25px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    }
    .admin-content {
      padding: 30px 25px;
      flex-grow: 1;
    }
    .card {
      border: none;
      box-shadow: 0 2px 6px rgba(0,0,0,0.04);
      border-radius: 8px;
      margin-bottom: 25px;
    }
    .card-header {
      background-color: #fff;
      border-bottom: 1px solid #edf2f7;
      padding: 16px 20px;
      font-weight: 600;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .stat-card {
      border-radius: 10px;
      padding: 22px;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: space-between;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
      transition: transform 0.2s ease;
    }
    .stat-card:hover {
      transform: translateY(-2px);
    }
    .stat-card.bg-blue { background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); }
    .stat-card.bg-green { background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); }
    .stat-card.bg-orange { background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%); }
    .stat-card.bg-purple { background: linear-gradient(135deg, #654ea3 0%, #eaafc8 100%); }
    .stat-card .stat-icon {
      font-size: 38px;
      opacity: 0.85;
    }
    .stat-card h3 {
      font-size: 28px;
      font-weight: 700;
      margin: 0;
    }
    .stat-card p {
      margin: 0;
      font-size: 13px;
      opacity: 0.9;
    }
    .btn-church {
      background-color: #2b3a4a;
      color: #fff;
      border: none;
    }
    .btn-church:hover {
      background-color: #1b2530;
      color: #fff;
    }
  </style>
  @stack('styles')
</head>
<body>
  <div class="admin-wrapper">
    <!-- Sidebar -->
    <aside class="admin-sidebar">
      <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
        <img src="{{ asset('assets/img/diocese/crest_transparent.png') }}" alt="Diocese of Jalle">
        <div class="sidebar-brand-text">
          <h6>Diocese of Jalle</h6>
          <small>Administration Portal</small>
        </div>
      </a>
      <ul class="sidebar-menu">
        <li class="menu-header">Main Navigation</li>
        <li>
          <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt"></i> Dashboard
          </a>
        </li>
        <li class="menu-header">Church Content</li>
        <li>
          <a href="{{ route('admin.posts.index') }}" class="{{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
            <i class="fas fa-newspaper"></i> News & Articles
          </a>
        </li>
        <li>
          <a href="{{ route('admin.sermons.index') }}" class="{{ request()->routeIs('admin.sermons.*') ? 'active' : '' }}">
            <i class="fas fa-bible"></i> Sermons & Word
          </a>
        </li>
        <li>
          <a href="{{ route('admin.events.index') }}" class="{{ request()->routeIs('admin.events.*') ? 'active' : '' }}">
            <i class="fas fa-calendar-alt"></i> Events & Synods
          </a>
        </li>
        <li class="menu-header">Interactions</li>
        <li>
          <a href="{{ route('admin.messages.index') }}" class="{{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
            <i class="fas fa-envelope"></i> Inquiries & Prayers
          </a>
        </li>
        <li class="menu-header">Public Site</li>
        <li>
          <a href="{{ route('home') }}" target="_blank">
            <i class="fas fa-external-link-alt"></i> View Website
          </a>
        </li>
      </ul>
      <div class="sidebar-footer">
        <span>Logged in as:</span>
        <strong class="d-block text-white">{{ Auth::user()->name ?? 'Administrator' }}</strong>
      </div>
    </aside>

    <!-- Main Content Area -->
    <div class="admin-main">
      <!-- Topbar -->
      <header class="admin-topbar">
        <div class="d-flex align-items-center gap-2">
          <span class="fw-bold text-secondary"><i class="fas fa-cross me-2 text-warning"></i> Episcopal Church of South Sudan</span>
        </div>
        <div class="d-flex align-items-center gap-3">
          <span class="text-muted small d-none d-md-inline"><i class="far fa-user-circle me-1"></i> {{ Auth::user()->email ?? '' }}</span>
          <form action="{{ route('logout') }}" method="POST" class="m-0">
            @csrf
            <button type="submit" class="btn btn-sm btn-outline-danger">
              <i class="fas fa-sign-out-alt me-1"></i> Sign Out
            </button>
          </form>
        </div>
      </header>

      <!-- Page Content -->
      <main class="admin-content">
        @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        @if(session('status'))
          <div class="alert alert-info alert-dismissible fade show" role="alert">
            <i class="fas fa-info-circle me-2"></i> {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        @if($errors->any())
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong class="d-block mb-1"><i class="fas fa-exclamation-triangle me-2"></i> Please correct the following errors:</strong>
            <ul class="mb-0 ps-3">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        @yield('content')
      </main>
    </div>
  </div>

  <script src="{{ asset('assets/js/plugins/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
  @stack('scripts')
</body>
</html>
