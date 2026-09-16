@extends('layouts.app')

@section('title', 'Diocesan Mission & Development Projects')

@section('content')
<!-- Subheader Start -->
  <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url('{{ asset('assets/img/subheader.webp') }}')">
    <div class="container">
      <div class="sigma_subheader-inner">
        <div class="sigma_subheader-text">
          <h1>Projects & Giving Appeals</h1>
          <p class="blockquote light">Diocese of Jalle — Jonglei Internal Province, Episcopal Church of South Sudan (ECSS)</p>
        </div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn-link" href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Projects</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- Subheader End -->

  <div class="section section-padding">
    <div class="container">
      <div class="section-title text-center">
        <p class="subtitle">Partnership Opportunities</p>
        <h4 class="title">Diocesan Projects & Appeals</h4>
        <p class="max-w-700 mx-auto text-muted">Learn about the priority initiatives and developmental projects undertaken by the Diocese of Jalle.</p>
      </div>

      <div class="row">
        <!-- Project 1 -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="sigma_service style-2 border rounded overflow-hidden h-100 d-flex flex-column justify-content-between">
            <div>
              <img loading="lazy" src="{{ asset('assets/img/diocese/church-community-2.jpeg') }}" alt="Parish Sanctuary Construction" style="height: 220px; width: 100%; object-fit: cover;">
              <div class="p-4">
                <h5><a href="{{ route('donation') }}">Permanent Parish Sanctuaries</a></h5>
                <p class="text-muted fs-14">Replacing temporary thatched structures with durable iron-roofed brick sanctuaries resilient against seasonal weather in Jalle Payam.</p>
              </div>
            </div>
            <div class="p-4 pt-0">
              <a href="{{ route('donation') }}" class="sigma_btn-custom w-100 text-center">Support Building</a>
            </div>
          </div>
        </div>

        <!-- Project 2 -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="sigma_service style-2 border rounded overflow-hidden h-100 d-flex flex-column justify-content-between">
            <div>
              <img loading="lazy" src="{{ asset('assets/img/diocese/fellowship-assembly.jpeg') }}" alt="Flood Relief" style="height: 220px; width: 100%; object-fit: cover;">
              <div class="p-4">
                <h5><a href="{{ route('donation') }}">Emergency Flood & Food Relief</a></h5>
                <p class="text-muted fs-14">Distributing flour, grains, blankets, and essential medical supplies to vulnerable families affected by seasonal Nile overflow.</p>
              </div>
            </div>
            <div class="p-4 pt-0">
              <a href="{{ route('donation') }}" class="sigma_btn-custom w-100 text-center">Support Relief</a>
            </div>
          </div>
        </div>

        <!-- Project 3 -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="sigma_service style-2 border rounded overflow-hidden h-100 d-flex flex-column justify-content-between">
            <div>
              <img loading="lazy" src="{{ asset('assets/img/diocese/mothers-union.jpeg') }}" alt="Mothers' Union Empowerment" style="height: 220px; width: 100%; object-fit: cover;">
              <div class="p-4">
                <h5><a href="{{ route('donation') }}">Women's Literacy & Livelihoods</a></h5>
                <p class="text-muted fs-14">Supporting the Mothers' Union in providing basic literacy classes, sewing machines, and farming tools for rural women.</p>
              </div>
            </div>
            <div class="p-4 pt-0">
              <a href="{{ route('donation') }}" class="sigma_btn-custom w-100 text-center">Support MU Project</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
