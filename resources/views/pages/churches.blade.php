@extends('layouts.app')

@section('title', 'Churches & Parishes - Diocese of Jalle')
@section('meta_description', 'Explore the parishes, archdeaconries, and worship congregations across Jalle Payam, Bor County, Jonglei State, in the Diocese of Jalle, Episcopal Church of South Sudan.')

@section('content')
<!-- Subheader Start -->
<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url('{{ asset('assets/img/subheader.webp') }}')">
  <div class="container">
    <div class="sigma_subheader-inner">
      <div class="sigma_subheader-text">
        <h1>Churches &amp; Parishes</h1>
        <p class="blockquote light">Local Congregations of the Diocese of Jalle — Jonglei Internal Province, ECSS</p>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="btn-link" href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Churches &amp; Parishes</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<!-- Subheader End -->

<!-- Intro Start -->
<div class="section section-padding pb-0">
  <div class="container">
    <div class="section-title text-center">
      <p class="subtitle">Our Local Congregations</p>
      <h4 class="title">Parish Network of the Diocese of Jalle</h4>
      <p class="mx-auto" style="max-width: 640px;">The Diocese of Jalle comprises several parishes and mission stations spread across Jalle Payam, Bor County, in Jonglei State. Each congregation is served by ordained clergy and lay leaders, committed to preaching the Gospel, offering pastoral care, and building community.</p>
    </div>
  </div>
</div>
<!-- Intro End -->

<!-- Archdeaconries Start -->
<div class="section section-padding">
  <div class="container">

    <!-- Archdeaconry 1 -->
    <div class="mb-5">
      <div class="d-flex align-items-center mb-4">
        <div class="me-3 p-3 rounded" style="background: var(--mht-primary, #1a4a7a);">
          <i class="fas fa-church text-white fa-lg"></i>
        </div>
        <div>
          <h4 class="mb-0">Jalle Central Archdeaconry</h4>
          <small class="text-muted">Archdeacon: Rev. Samuel Akuak &bull; Jalle Payam, Bor County</small>
        </div>
      </div>
      <div class="row g-4">
        @foreach([
          ['St. Peter\'s Cathedral', 'Jalle Payam', 'Cathedral Church — Main Sunday Eucharist, Confirmations & Ordinations', 'flaticon-church'],
          ['St. Paul\'s Parish Church', 'Jalle Payam', 'Midweek Bible studies, Mothers\' Union chapter, and Sunday services', 'flaticon-church-2'],
          ['Holy Trinity Mission', 'Jalle North', 'Evangelism outpost and growing congregation in the northern parishes', 'flaticon-praying'],
          ['St. Andrew\'s Church', 'Jalle South', 'Youth ministry hub with active choir and Sunday school programme', 'flaticon-speech'],
        ] as $church)
        <div class="col-lg-6">
          <div class="sigma_service border style-1 bg-white h-100">
            <div class="sigma_service-thumb">
              <i class="{{ $church[3] }}"></i>
              <span></span><span></span>
            </div>
            <div class="sigma_service-body">
              <h5>{{ $church[0] }}</h5>
              <p class="text-muted small mb-1"><i class="fas fa-map-marker-alt text-danger me-1"></i> {{ $church[1] }}</p>
              <p>{{ $church[2] }}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>

    <hr class="my-5">

    <!-- Archdeaconry 2 -->
    <div class="mb-5">
      <div class="d-flex align-items-center mb-4">
        <div class="me-3 p-3 rounded" style="background: var(--mht-secondary, #c8a951);">
          <i class="fas fa-cross text-white fa-lg"></i>
        </div>
        <div>
          <h4 class="mb-0">Bor County Mission Area</h4>
          <small class="text-muted">Pastoral Oversight: Bishop's Commissioner &bull; Bor County Outreach</small>
        </div>
      </div>
      <div class="row g-4">
        @foreach([
          ['Christ the King Church', 'Bor Town', 'Urban congregation serving displaced communities and youth', 'flaticon-church'],
          ['All Saints Mission Station', 'Kolnyang', 'Rural outreach station with catechism and literacy ministry', 'flaticon-charity'],
          ['St. Mary\'s Church', 'Makuach', 'Mothers\' Union-led congregation with strong women\'s fellowship', 'flaticon-church-2'],
          ['Good Shepherd Chapel', 'Mingkaman', 'Remote ministry and emergency pastoral support for flood-affected families', 'flaticon-praying'],
        ] as $church)
        <div class="col-lg-6">
          <div class="sigma_service border style-1 bg-white h-100">
            <div class="sigma_service-thumb">
              <i class="{{ $church[3] }}"></i>
              <span></span><span></span>
            </div>
            <div class="sigma_service-body">
              <h5>{{ $church[0] }}</h5>
              <p class="text-muted small mb-1"><i class="fas fa-map-marker-alt text-danger me-1"></i> {{ $church[1] }}</p>
              <p>{{ $church[2] }}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>

    <!-- Contact CTA -->
    <div class="section-padding pt-0">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="p-5 text-center rounded shadow-sm" style="background: var(--mht-primary, #1a4a7a);">
            <i class="fas fa-envelope fa-2x text-white mb-3 d-block"></i>
            <h4 class="text-white mb-2">Connect With Your Nearest Parish</h4>
            <p class="text-white-50 mb-4">For information on service times, baptisms, weddings, or pastoral visits at any of our churches, please contact the Diocesan Secretariat.</p>
            <a href="{{ route('contact') }}" class="sigma_btn-custom secondary">Contact the Diocese <i class="far fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- Archdeaconries End -->
@endsection
