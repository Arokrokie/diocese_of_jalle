@extends('layouts.app')

@section('title', 'Diocesan Leadership & Clergy')

@section('content')
<!-- Subheader Start -->
  <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url('{{ asset('assets/img/subheader.webp') }}')">
    <div class="container">
      <div class="sigma_subheader-inner">
        <div class="sigma_subheader-text">
          <h1>Diocesan Leadership & Clergy</h1>
          <p class="blockquote light">Diocese of Jalle — Jonglei Internal Province, Episcopal Church of South Sudan (ECSS)</p>
        </div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn-link" href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Leadership</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- Subheader End -->

  <div class="section section-padding">
    <div class="container">
      <div class="section-title text-center">
        <p class="subtitle">Episcopal Leadership</p>
        <h4 class="title">Diocesan Clergy &amp; Leadership</h4>
        <p class="max-w-700 mx-auto text-muted">The ordained and lay servants of God guiding the parishes, archdeaconries, and ministries of the Diocese of Jalle.</p>
      </div>

      <div class="row">
        <!-- Bishop -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="sigma_volunteers rounded overflow-hidden shadow-sm h-100 d-flex flex-column" style="background:#fff; border-bottom: 3px solid #022147;">
            <div class="sigma_volunteers-thumb" style="height: 260px; background: #eaedf0; display: flex; align-items: center; justify-content: center; overflow: hidden;">
              <img loading="lazy" src="{{ asset('assets/img/diocese/abraham.jpeg') }}" alt="Rt. Rev. Abraham Matiop Deng Kechdit" class="img-full-display">
            </div>
            <div class="sigma_volunteers-body">
              <div class="sigma_volunteers-info">
                <p class="text-dark fw-600 mb-1">Diocesan Bishop</p>
                <h5>
                  <a class="text-dark" href="{{ route('bishop') }}">Rt. Rev. Abraham Matiop Deng</a>
                </h5>
                <p class="text-dark fs-13 mb-0">Episcopal oversight, church planting, and pastoral leadership.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Bishop's Commissioner -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="sigma_volunteers rounded overflow-hidden shadow-sm h-100 d-flex flex-column" style="background:#fff; border-bottom: 3px solid #022147;">
            <div class="sigma_volunteers-thumb" style="height: 260px; background: #eaedf0; display: flex; align-items: center; justify-content: center; overflow: hidden;">
              <img loading="lazy" src="{{ asset('assets/img/diocese/micheal.jpeg') }}" alt="Canon Michael Makuol Garang" class="img-full-display">
            </div>
            <div class="sigma_volunteers-body">
              <div class="sigma_volunteers-info">
                <p class="text-dark fw-600 mb-1">Bishop's Commissioner</p>
                <h5>
                  <a class="text-dark" href="{{ route('clergy.detail', 'canon-michael-makuol-garang') }}">Canon Michael Makuol Garang</a>
                </h5>
                <p class="text-dark fs-13 mb-0">Assisting the Bishop in oversight, parish supervision, and diocesan administration.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Secretary of Diocese -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="sigma_volunteers rounded overflow-hidden shadow-sm h-100 d-flex flex-column" style="background:#fff; border-bottom: 3px solid #022147;">
            <div class="sigma_volunteers-thumb" style="height: 260px; background: #eaedf0; display: flex; align-items: center; justify-content: center; overflow: hidden;">
              <img loading="lazy" src="{{ asset('assets/img/diocese/samuel.jpeg') }}" alt="Archdeacon Samuel Akuak" class="img-full-display">
            </div>
            <div class="sigma_volunteers-body">
              <div class="sigma_volunteers-info">
                <p class="text-dark fw-600 mb-1">Secretary of Diocese</p>
                <h5>
                  <a class="text-dark" href="{{ route('clergy.detail', 'archdeacon-samuel-akuak') }}">Archdeacon Samuel Akuak</a>
                </h5>
                <p class="text-dark fs-13 mb-0">Coordinating diocesan records, communications, and synodal administration.</p>
              </div>
            </div>
          </div>
        </div>


        <!-- Mothers' Union President -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="sigma_volunteers rounded overflow-hidden shadow-sm h-100 d-flex flex-column" style="background:#fff; border-bottom: 3px solid #022147;">
            <div class="sigma_volunteers-thumb" style="height: 260px; background: #eaedf0; display: flex; align-items: center; justify-content: center; overflow: hidden;">
              <img loading="lazy" src="{{ asset('assets/img/diocese/mothers-union.jpeg') }}" alt="Mothers' Union President" class="img-full-display">
            </div>
            <div class="sigma_volunteers-body">
              <div class="sigma_volunteers-info">
                <p class="text-dark fw-600 mb-1">Diocesan MU President</p>
                <h5>
                  <a class="text-dark" href="{{ route('clergy.detail', 'mothers-union-president') }}">Mothers' Union Leadership</a>
                </h5>
                <p class="text-dark fs-13 mb-0">Mobilizing women, family discipleship, and prayer mobilization.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Youth & Choir Ministry -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="sigma_volunteers rounded overflow-hidden shadow-sm h-100 d-flex flex-column" style="background:#fff; border-bottom: 3px solid #022147;">
            <div class="sigma_volunteers-thumb" style="height: 260px; background: #eaedf0; display: flex; align-items: center; justify-content: center; overflow: hidden;">
              <img loading="lazy" src="{{ asset('assets/img/diocese/choir-and-procession.jpeg') }}" alt="Diocesan Youth Ministry" class="img-full-display">
            </div>
            <div class="sigma_volunteers-body">
              <div class="sigma_volunteers-info">
                <p class="text-dark fw-600 mb-1">Youth &amp; Music Ministry</p>
                <h5>
                  <a class="text-dark" href="{{ route('clergy.detail', 'youth-director') }}">Diocesan Youth & Choir Leaders</a>
                </h5>
                <p class="text-dark fs-13 mb-0">Discipling the young, choir coordination, and liturgical servers.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Full Parish Clergy -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="sigma_volunteers rounded overflow-hidden shadow-sm h-100 d-flex flex-column" style="background:#fff; border-bottom: 3px solid #022147;">
            <div class="sigma_volunteers-thumb" style="height: 260px; background: #eaedf0; display: flex; align-items: center; justify-content: center; overflow: hidden;">
              <img loading="lazy" src="{{ asset('assets/img/diocese/clergy-full-group.jpeg') }}" alt="Diocesan Priests & Deacons" class="img-full-display">
            </div>
            <div class="sigma_volunteers-body">
              <div class="sigma_volunteers-info">
                <p class="text-dark fw-600 mb-1">Parish Ministry</p>
                <h5>
                  <a class="text-dark" href="{{ route('leadership') }}">Parish Priests & Deacons</a>
                </h5>
                <p class="text-dark fs-13 mb-0">Pastoral care, preaching, Holy Communion, and baptism.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Lay Readers & Evangelists -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="sigma_volunteers rounded overflow-hidden shadow-sm h-100 d-flex flex-column" style="background:#fff; border-bottom: 3px solid #022147;">
            <div class="sigma_volunteers-thumb" style="height: 260px; background: #eaedf0; display: flex; align-items: center; justify-content: center; overflow: hidden;">
              <img loading="lazy" src="{{ asset('assets/img/diocese/fellowship-assembly.jpeg') }}" alt="Lay Readers and Evangelists" class="img-full-display">
            </div>
            <div class="sigma_volunteers-body">
              <div class="sigma_volunteers-info">
                <p class="text-dark fw-600 mb-1">Lay Ministry</p>
                <h5>
                  <a class="text-dark" href="{{ route('leadership') }}">Evangelists & Catechists</a>
                </h5>
                <p class="text-dark fs-13 mb-0">Grassroots gospel outreach in bomas, cattle camps, and villages.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
