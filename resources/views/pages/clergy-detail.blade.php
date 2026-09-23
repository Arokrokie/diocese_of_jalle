@extends('layouts.app')

@section('title', $clergy['name'] . ' - Diocese of Jalle Clergy')

@section('content')
<!-- Subheader Start -->
<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url('{{ asset('assets/img/subheader.webp') }}')">
  <div class="container">
    <div class="sigma_subheader-inner">
      <div class="sigma_subheader-text">
        <h1>Clergy Profile</h1>
        <p class="blockquote light">Diocese of Jalle — Jonglei Internal Province, Episcopal Church of South Sudan (ECSS)</p>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="btn-link" href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item"><a class="btn-link" href="{{ route('leadership') }}">Clergy &amp; Leadership</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $clergy['name'] }}</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<!-- Subheader End -->

<div class="section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-5 mb-4 mb-lg-0">
        <div class="sigma_volunteers-details-thumb">
          <img loading="lazy" src="{{ asset($clergy['image']) }}" alt="{{ $clergy['name'] }}" class="w-100 rounded shadow">
        </div>
      </div>
      <div class="col-lg-7">
        <div class="ps-lg-4">
          <h2 class="mb-1">{{ $clergy['name'] }}</h2>
          <p class="custom-primary fw-bold text-uppercase fs-14 mb-3">{{ $clergy['title'] }} | Diocese of Jalle, ECSS</p>
          @if(isset($clergy['quote']))
          <p class="blockquote bg-transparent border-start border-primary border-3 ps-3 mb-3">
            "{{ $clergy['quote'] }}"
          </p>
          @endif
          <p>{{ $clergy['bio'] }}</p>
          <div class="row mt-4">
            <div class="col-sm-6 mb-2">
              <p><strong>Province:</strong> Jonglei Internal Province (ECSS)</p>
              <p><strong>Diocese:</strong> Diocese of Jalle</p>
            </div>
            <div class="col-sm-6 mb-2">
              <p><strong>Email:</strong> info@dioceseofjalle.org</p>
              @if(isset($clergy['focus']))
              <p><strong>Focus:</strong> {{ $clergy['focus'] }}</p>
              @endif
            </div>
          </div>
          <div class="btn-pair mt-3">
            <a href="{{ route('contact') }}" class="sigma_btn-custom">Contact Diocese <i class="far fa-arrow-right ms-1"></i></a>
            <a href="{{ route('leadership') }}" class="sigma_btn-custom light">All Clergy <i class="far fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>
    </div>

    @if(isset($clergy['ministry_areas']))
    <!-- Ministry Areas -->
    <div class="row mt-5 pt-4 border-top">
      @foreach($clergy['ministry_areas'] as $area)
      <div class="col-lg-4 mb-4">
        <div class="p-4 bg-light rounded h-100">
          <h5><i class="{{ $area['icon'] }} custom-primary me-2"></i> {{ $area['title'] }}</h5>
          <p class="text-muted mb-0">{{ $area['description'] }}</p>
        </div>
      </div>
      @endforeach
    </div>
    @endif
  </div>
</div>
@endsection
