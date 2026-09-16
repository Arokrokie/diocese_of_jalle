@extends('layouts.app')

@section('title', 'Worship Services & Parish Times')

@section('content')
<!-- Subheader Start -->
  <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url('{{ asset('assets/img/subheader.webp') }}')">
    <div class="container">
      <div class="sigma_subheader-inner">
        <div class="sigma_subheader-text">
          <h1>Worship Services & Liturgy</h1>
          <p class="blockquote light">Diocese of Jalle — Jonglei Internal Province, Episcopal Church of South Sudan (ECSS)</p>
        </div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn-link" href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Services</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- Subheader End -->

  <div class="section section-padding">
    <div class="container">
      <div class="section-title text-center">
        <p class="subtitle">Worship With Us</p>
        <h4 class="title">Diocesan Services & Liturgy</h4>
        <p class="max-w-700 mx-auto text-muted fs-14">Join the Christian family of the Diocese of Jalle in reverent worship, biblical preaching, holy sacraments, and joyful singing.</p>
      </div>

      <div class="row">
        <!-- Service 1 -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="service-item-card p-4 rounded h-100 d-flex flex-column justify-content-between bg-white shadow-sm border">
            <div>
              <div class="service-icon-box mb-3">
                <i class="flaticon-church custom-primary"></i>
              </div>
              <h5 class="fs-18 fw-bold mb-2">Sunday Morning Service</h5>
              <p class="text-muted fs-13 mb-3">A vibrant service featuring the Anglican Book of Common Prayer, choir anthems, scripture readings, and uplifting sermons.</p>
              <ul class="list-unstyled service-meta-info mb-3">
                <li><i class="far fa-clock"></i> <span><strong>Time:</strong> 9:00 AM – 11:00 AM</span></li>
                <li><i class="fas fa-map-marker-alt"></i> <span><strong>Where:</strong> All Parishes</span></li>
              </ul>
            </div>
            <a href="{{ route('service.detail') }}" class="sigma_btn-custom light w-100 text-center">Service Details</a>
          </div>
        </div>

        <!-- Service 2 -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="service-item-card p-4 rounded h-100 d-flex flex-column justify-content-between bg-white shadow-sm border">
            <div>
              <div class="service-icon-box mb-3">
                <i class="flaticon-bible custom-primary"></i>
              </div>
              <h5 class="fs-18 fw-bold mb-2">Holy Communion</h5>
              <p class="text-muted fs-13 mb-3">Celebrating the Lord's Supper in remembrance of Christ's sacrifice, renewing our covenant of faith and love.</p>
              <ul class="list-unstyled service-meta-info mb-3">
                <li><i class="far fa-clock"></i> <span><strong>Time:</strong> 11:00 AM – 12:30 PM</span></li>
                <li><i class="fas fa-map-marker-alt"></i> <span><strong>Where:</strong> Cathedral & Parishes</span></li>
              </ul>
            </div>
            <a href="{{ route('service.detail') }}" class="sigma_btn-custom light w-100 text-center">Service Details</a>
          </div>
        </div>

        <!-- Service 3 -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="service-item-card p-4 rounded h-100 d-flex flex-column justify-content-between bg-white shadow-sm border">
            <div>
              <div class="service-icon-box mb-3">
                <i class="flaticon-praying custom-primary"></i>
              </div>
              <h5 class="fs-18 fw-bold mb-2">Midweek Bible & Prayer</h5>
              <p class="text-muted fs-13 mb-3">Deep dive into scripture verses, intercessory prayer for families, peace in South Sudan, and pastoral blessings.</p>
              <ul class="list-unstyled service-meta-info mb-3">
                <li><i class="far fa-clock"></i> <span><strong>Time:</strong> Wednesday 4:00 PM</span></li>
                <li><i class="fas fa-map-marker-alt"></i> <span><strong>Where:</strong> Parish Chapels</span></li>
              </ul>
            </div>
            <a href="{{ route('service.detail') }}" class="sigma_btn-custom light w-100 text-center">Service Details</a>
          </div>
        </div>

        <!-- Service 4 -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="service-item-card p-4 rounded h-100 d-flex flex-column justify-content-between bg-white shadow-sm border">
            <div>
              <div class="service-icon-box mb-3">
                <i class="flaticon-charity custom-primary"></i>
              </div>
              <h5 class="fs-18 fw-bold mb-2">Mothers' Union Fellowship</h5>
              <p class="text-muted fs-13 mb-3">Weekly devotional gathering of women for prayer, family counseling, and community mutual assistance.</p>
              <ul class="list-unstyled service-meta-info mb-3">
                <li><i class="far fa-clock"></i> <span><strong>Time:</strong> Thursday 3:00 PM</span></li>
                <li><i class="fas fa-map-marker-alt"></i> <span><strong>Where:</strong> MU Centers</span></li>
              </ul>
            </div>
            <a href="{{ route('ministry.detail') }}" class="sigma_btn-custom light w-100 text-center">MU Fellowship</a>
          </div>
        </div>

        <!-- Service 5 -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="service-item-card p-4 rounded h-100 d-flex flex-column justify-content-between bg-white shadow-sm border">
            <div>
              <div class="service-icon-box mb-3">
                <i class="flaticon-speech custom-primary"></i>
              </div>
              <h5 class="fs-18 fw-bold mb-2">Holy Baptism & Confirmation</h5>
              <p class="text-muted fs-13 mb-3">Administering the sacrament of Christian initiation for infants and believers, and episcopal confirmation by the Bishop.</p>
              <ul class="list-unstyled service-meta-info mb-3">
                <li><i class="far fa-clock"></i> <span><strong>Time:</strong> Scheduled Synods</span></li>
                <li><i class="fas fa-map-marker-alt"></i> <span><strong>Where:</strong> Diocesan Parishes</span></li>
              </ul>
            </div>
            <a href="{{ route('contact') }}" class="sigma_btn-custom light w-100 text-center">Inquire / Register</a>
          </div>
        </div>

        <!-- Service 6 -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="service-item-card p-4 rounded h-100 d-flex flex-column justify-content-between bg-white shadow-sm border">
            <div>
              <div class="service-icon-box mb-3">
                <i class="flaticon-church-2 custom-primary"></i>
              </div>
              <h5 class="fs-18 fw-bold mb-2">Christian Marriage Blessings</h5>
              <p class="text-muted fs-13 mb-3">Celebrating holy matrimony with pastoral counseling, community witness, and episcopal blessing.</p>
              <ul class="list-unstyled service-meta-info mb-3">
                <li><i class="far fa-clock"></i> <span><strong>Time:</strong> By Appointment</span></li>
                <li><i class="fas fa-map-marker-alt"></i> <span><strong>Where:</strong> Parish Churches</span></li>
              </ul>
            </div>
            <a href="{{ route('contact') }}" class="sigma_btn-custom light w-100 text-center">Inquire / Register</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
