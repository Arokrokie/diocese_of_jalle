@extends('layouts.app')

@section('title', 'Ministries of the Diocese')
@section('meta_description', 'Discover the active ministries of the Diocese of Jalle: Mothers\' Union, Youth & Choir, Evangelism & Church Planting, Peacebuilding, and Community Humanitarian Relief.')

@section('content')
<!-- Subheader Start -->
  <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url('{{ asset('assets/img/subheader.webp') }}')">
    <div class="container">
      <div class="sigma_subheader-inner">
        <div class="sigma_subheader-text">
          <h1>Diocesan Ministries</h1>
          <p class="blockquote light">Diocese of Jalle — Jonglei Internal Province, Episcopal Church of South Sudan (ECSS)</p>
        </div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn-link" href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ministries</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- Subheader End -->

  <div class="section section-padding">
    <div class="container">
      <div class="section-title text-center">
        <p class="subtitle">Faith in Action</p>
        <h4 class="title">Diocesan Ministries</h4>
        <p class="max-w-700 mx-auto text-muted">Discover the various departments and mission areas through which the Diocese of Jalle ministers to every age and community need.</p>
      </div>

      <div class="row">
        <!-- Ministry 1: Mothers' Union -->
        <div class="col-lg-6 mb-4">
          <div class="sigma_service style-2 border rounded p-4 h-100">
            <div class="row align-items-center">
              <div class="col-md-5 mb-3 mb-md-0">
                <div class="rounded overflow-hidden" style="height: 190px; background: #eaedf0; display: flex; align-items: center; justify-content: center;"><img loading="lazy" src="{{ asset('assets/img/diocese/mothers-union.jpeg') }}" alt="Mothers' Union" class="img-full-display"></div>
              </div>
              <div class="col-md-7">
                <h5><a href="{{ route('ministry.detail') }}">Mothers' Union (MU)</a></h5>
                <p class="text-muted">A worldwide Christian fellowship supporting marriage, family life, women's empowerment, and community development across Jalle.</p>
                <a href="{{ route('ministry.detail') }}" class="custom-primary fw-bold">Learn More <i class="far fa-arrow-right ms-1"></i></a>
              </div>
            </div>
          </div>
        </div>

        <!-- Ministry 2: Youth & Praise -->
        <div class="col-lg-6 mb-4">
          <div class="sigma_service style-2 border rounded p-4 h-100">
            <div class="row align-items-center">
              <div class="col-md-5 mb-3 mb-md-0">
                <div class="rounded overflow-hidden" style="height: 190px; background: #eaedf0; display: flex; align-items: center; justify-content: center;"><img loading="lazy" src="{{ asset('assets/img/diocese/choir-and-procession.jpeg') }}" alt="Youth Ministry" class="img-full-display"></div>
              </div>
              <div class="col-md-7">
                <h5><a href="{{ route('ministries') }}">Youth & Praise Ministry</a></h5>
                <p class="text-muted">Raising young leaders with Biblical integrity through choral worship, youth conferences, sports, and peace education.</p>
                <a href="{{ route('contact') }}" class="custom-primary fw-bold">Get Involved <i class="far fa-arrow-right ms-1"></i></a>
              </div>
            </div>
          </div>
        </div>

        <!-- Ministry 3: Evangelism & Mission -->
        <div class="col-lg-6 mb-4">
          <div class="sigma_service style-2 border rounded p-4 h-100">
            <div class="row align-items-center">
              <div class="col-md-5 mb-3 mb-md-0">
                <div class="rounded overflow-hidden" style="height: 190px; background: #eaedf0; display: flex; align-items: center; justify-content: center;"><img loading="lazy" src="{{ asset('assets/img/diocese/clergy-full-group.jpeg') }}" alt="Evangelism" class="img-full-display"></div>
              </div>
              <div class="col-md-7">
                <h5><a href="{{ route('ministries') }}">Evangelism & Church Planting</a></h5>
                <p class="text-muted">Equipping pastors, deacons, and evangelists to plant churches and bring the Word of God to cattle camps and remote payams.</p>
                <a href="{{ route('leadership') }}" class="custom-primary fw-bold">Meet Evangelists <i class="far fa-arrow-right ms-1"></i></a>
              </div>
            </div>
          </div>
        </div>

        <!-- Ministry 4: Peace & Reconciliation -->
        <div class="col-lg-6 mb-4">
          <div class="sigma_service style-2 border rounded p-4 h-100">
            <div class="row align-items-center">
              <div class="col-md-5 mb-3 mb-md-0">
                <div class="rounded overflow-hidden" style="height: 190px; background: #eaedf0; display: flex; align-items: center; justify-content: center;"><img loading="lazy" src="{{ asset('assets/img/diocese/fellowship-assembly.jpeg') }}" alt="Peacebuilding" class="img-full-display"></div>
              </div>
              <div class="col-md-7">
                <h5><a href="{{ route('ministries') }}">Peacebuilding & Reconciliation</a></h5>
                <p class="text-muted">Standing as peacemakers in Jonglei State, facilitating inter-community dialogue, forgiveness, and healing from past conflicts.</p>
                <a href="{{ route('about') }}" class="custom-primary fw-bold">Our Peace Mission <i class="far fa-arrow-right ms-1"></i></a>
              </div>
            </div>
          </div>
        </div>

        <!-- Ministry 5: Sunday School & Children -->
        <div class="col-lg-6 mb-4">
          <div class="sigma_service style-2 border rounded p-4 h-100">
            <div class="row align-items-center">
              <div class="col-md-5 mb-3 mb-md-0">
                <div class="rounded overflow-hidden" style="height: 190px; background: #eaedf0; display: flex; align-items: center; justify-content: center;"><img loading="lazy" src="{{ asset('assets/img/diocese/church-community-1.jpeg') }}" alt="Sunday School" class="img-full-display"></div>
              </div>
              <div class="col-md-7">
                <h5><a href="{{ route('ministries') }}">Sunday School & Child Nurture</a></h5>
                <p class="text-muted">Teaching children scripture memorization, Christian songs, moral virtues, and basic literacy in local parishes.</p>
                <a href="{{ route('services') }}" class="custom-primary fw-bold">Sunday Timings <i class="far fa-arrow-right ms-1"></i></a>
              </div>
            </div>
          </div>
        </div>

        <!-- Ministry 6: Relief & Community Care -->
        <div class="col-lg-6 mb-4">
          <div class="sigma_service style-2 border rounded p-4 h-100">
            <div class="row align-items-center">
              <div class="col-md-5 mb-3 mb-md-0">
                <div class="rounded overflow-hidden" style="height: 190px; background: #eaedf0; display: flex; align-items: center; justify-content: center;"><img loading="lazy" src="{{ asset('assets/img/diocese/outreach-gathering.jpeg') }}" alt="Relief and Care" class="img-full-display"></div>
              </div>
              <div class="col-md-7">
                <h5><a href="{{ route('donation') }}">Humanitarian Relief & Care</a></h5>
                <p class="text-muted">Mobilizing emergency food, temporary shelters, clean water supplies, and flood protection dykes in flood-affected regions.</p>
                <a href="{{ route('donation') }}" class="custom-primary fw-bold">Support Relief <i class="far fa-arrow-right ms-1"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
