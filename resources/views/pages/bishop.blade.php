@extends('layouts.app')

@section('title', 'Bishop Abraham Matiop Deng Kechdit - Bishop's Profile')

@section('content')
<!-- Subheader Start -->
  <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url('{{ asset('assets/img/subheader.webp') }}')">
    <div class="container">
      <div class="sigma_subheader-inner">
        <div class="sigma_subheader-text">
          <h1>Episcopal Profile</h1>
          <p class="blockquote light">Diocese of Jalle — Jonglei Internal Province, Episcopal Church of South Sudan (ECSS)</p>
        </div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn-link" href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Bishop Abraham Matiop</li>
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
            <img loading="lazy" src="{{ asset('assets/img/diocese/bishop-abraham-matiop.jpeg') }}" alt="Rt. Rev. Abraham Matiop Deng Kechdit" class="w-100 rounded shadow">
          </div>
        </div>
        <div class="col-lg-7">
          <div class="ps-lg-4">
            <h2 class="mb-1">Rt. Rev. Abraham Matiop Deng Kechdit</h2>
            <p class="custom-primary fw-bold text-uppercase fs-14 mb-3">Bishop of the Diocese of Jalle | ECSS</p>
            <p class="blockquote bg-transparent border-start border-primary border-3 ps-3 mb-3">
              "Feed my lambs... Take care of my sheep... Feed my sheep." — John 21:15-17
            </p>
            <p>
              The <strong>Rt. Rev. Abraham Matiop Deng Kechdit</strong> serves as the Bishop of the Diocese of Jalle within the Jonglei Internal Province of the Episcopal Church of South Sudan. A dedicated pastor, theologian, and reconciler, Bishop Abraham has devoted his ministry to spreading the Gospel of Christ, nurturing spiritual maturity, advocating for peace across Bor County, and supporting community development.
            </p>
            <p>
              Under his episcopal guidance, the Diocese of Jalle has expanded parish evangelism, strengthened the Mothers' Union, empowered the diocesan youth and choir, and led crucial relief initiatives for flood-affected families.
            </p>
            <div class="row mt-4">
              <div class="col-sm-6 mb-2">
                <p><strong>Province:</strong> Jonglei Internal Province (ECSS)</p>
                <p><strong>See:</strong> Jalle, Bor County, South Sudan</p>
              </div>
              <div class="col-sm-6 mb-2">
                <p><strong>Email:</strong> info@dioceseofjalle.org</p>
                <p><strong>Focus:</strong> Peacebuilding, Evangelism, Education</p>
              </div>
            </div>
            <div class="btn-pair mt-3">
              <a href="{{ route('contact') }}" class="sigma_btn-custom">Contact Bishop's Office</a>
              <a href="{{ route('sermons') }}" class="sigma_btn-custom light">Read Teachings</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Additional Bishop Ministry Details -->
      <div class="row mt-5 pt-4 border-top">
        <div class="col-lg-4 mb-4">
          <div class="p-4 bg-light rounded h-100">
            <h5><i class="fas fa-cross custom-primary me-2"></i> Pastoral Care</h5>
            <p class="text-muted mb-0">Regular visitation to remote parishes across Jalle Payam, confirming candidates, ordaining clergy, and offering spiritual counseling.</p>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="p-4 bg-light rounded h-100">
            <h5><i class="fas fa-dove custom-primary me-2"></i> Peace & Mediation</h5>
            <p class="text-muted mb-0">Active participation in regional peace initiatives, inter-community dialogues, and reconciliation councils in Jonglei State.</p>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="p-4 bg-light rounded h-100">
            <h5><i class="fas fa-hands-helping custom-primary me-2"></i> Humanitarian Relief</h5>
            <p class="text-muted mb-0">Mobilizing emergency food, temporary shelter, and agricultural recovery support for flood-impacted parish communities.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
