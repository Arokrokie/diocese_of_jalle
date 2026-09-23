@extends('layouts.app')

@section('title', 'Server Error (500)')

@section('content')
  <!-- Subheader Start -->
  <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url('{{ asset('assets/img/subheader.webp') }}')">
    <div class="container">
      <div class="sigma_subheader-inner">
        <div class="sigma_subheader-text">
          <h1>500 — Temporary Server Error</h1>
          <p class="blockquote light">Diocese of Jalle — Jonglei Internal Province (ECSS)</p>
        </div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn-link" href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">500 Error</li>
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
          <i class="far fa-exclamation-triangle display-3 text-custom" style="font-size: 4rem;"></i>
        </div>
        <h3 class="title mb-3">Something Went Wrong</h3>
        <p class="text-muted max-w-600 mx-auto mb-4" style="font-size: 15px;">
          We are experiencing a temporary issue on our server. Our diocesan technical team has been notified. 
          Please try refreshing this page in a few moments.
        </p>
        <div class="btn-pair justify-content-center mb-5">
          <a href="{{ route('home') }}" class="sigma_btn-custom">Return to Home</a>
          <a href="{{ route('contact') }}" class="sigma_btn-custom secondary">Contact Diocesan Office</a>
        </div>
      </div>
    </div>
  </div>
@endsection
