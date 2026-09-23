@extends('layouts.app')

@section('title', 'Page Not Found (404)')

@section('content')
  <!-- Subheader Start -->
  <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url('{{ asset('assets/img/subheader.webp') }}')">
    <div class="container">
      <div class="sigma_subheader-inner">
        <div class="sigma_subheader-text">
          <h1>404 — Page Not Found</h1>
          <p class="blockquote light">Diocese of Jalle — Jonglei Internal Province (ECSS)</p>
        </div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn-link" href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">404 Error</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- Subheader End -->

  <div class="section">
    <div class="container">
      <div class="text-center py-5">
        <div class="mb-4">
          <span class="display-1 fw-bold text-custom" style="font-size: 5.5rem; line-height: 1;">404</span>
        </div>
        <h3 class="title mb-3">We Couldn't Find That Page</h3>
        <p class="text-muted max-w-600 mx-auto mb-4" style="font-size: 15px;">
          The page you are looking for may have been moved, updated, or does not exist. 
          Please explore one of our core diocesan sections below:
        </p>
        <div class="btn-pair justify-content-center mb-5">
          <a href="{{ route('home') }}" class="sigma_btn-custom">Return to Home</a>
          <a href="{{ route('services') }}" class="sigma_btn-custom secondary">Worship Schedule</a>
          <a href="{{ route('contact') }}" class="sigma_btn-custom light">Contact Office</a>
        </div>
      </div>
    </div>
  </div>
@endsection
