@extends('layouts.app')

@section('title', 'Liturgy & Sacraments')

@section('content')
<!-- Subheader Start -->
  <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url('{{ asset('assets/img/subheader.webp') }}')">
    <div class="container">
      <div class="sigma_subheader-inner">
        <div class="sigma_subheader-text">
          <h1>Liturgy & Worship</h1>
          <p class="blockquote light">Diocese of Jalle — Jonglei Internal Province, Episcopal Church of South Sudan (ECSS)</p>
        </div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn-link" href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Service Details</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- Subheader End -->

  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="sigma_post-single-thumb mb-4">
            <img loading="lazy" src="{{ asset('assets/img/diocese/clergy-full-group.jpeg') }}" alt="Holy Communion Service" class="w-100 rounded shadow">
          </div>
          <h2>Sunday Holy Communion & Liturgy</h2>
          <p class="lead text-muted">
            Sunday morning worship at the Diocese of Jalle brings together our entire congregation in praise, prayer, and the breaking of bread.
          </p>
          <h4>Structure of Our Worship Service</h4>
          <p>
            Following the Anglican tradition of the Episcopal Church of South Sudan, our Sunday service is structured in two main parts:
          </p>
          <div class="accordion mb-4" id="liturgyAccordion">
            <div class="accordion-item mb-2 border rounded">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                  1. The Ministry of the Word
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#liturgyAccordion">
                <div class="accordion-body">
                  Includes the Opening Acclamation, Collect for Purity, singing of hymns in Dinka and English, scripture readings from the Old Testament, Epistle, and Gospel, followed by the pastoral sermon.
                </div>
              </div>
            </div>
            <div class="accordion-item mb-2 border rounded">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                  2. The Ministry of the Sacrament (Holy Communion)
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#liturgyAccordion">
                <div class="accordion-body">
                  Begins with prayers of the people, confession and absolution, the exchange of peace, the Eucharistic prayer of thanksgiving, and distribution of the consecrated bread and wine.
                </div>
              </div>
            </div>
            <div class="accordion-item mb-2 border rounded">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                  3. Post-Communion Thanksgiving & Blessing
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#liturgyAccordion">
                <div class="accordion-body">
                  The prayer of thanksgiving for divine nourishment, announcements of community welfare, pastoral benediction from the Bishop or presiding priest, and the joyful recessional hymn.
                </div>
              </div>
            </div>
          </div>
          <div class="btn-pair mt-3">
            <a href="{{ route('services') }}" class="sigma_btn-custom">View All Services</a>
            <a href="{{ route('contact') }}" class="sigma_btn-custom light">Find Local Parish</a>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="sidebar p-4 bg-light rounded">
            <h5 class="widget-title">Service Details</h5>
            <ul class="list-unstyled mb-4">
              <li class="mb-2"><strong>Day:</strong> Every Sunday</li>
              <li class="mb-2"><strong>Time:</strong> 9:00 AM – 12:30 PM</li>
              <li class="mb-2"><strong>Languages:</strong> Dinka & English</li>
              <li class="mb-2"><strong>Presiding:</strong> Bishop & Priests</li>
              <li class="mb-2"><strong>Cathedral:</strong> Jalle Payam, Bor County</li>
            </ul>
            <h5 class="widget-title mt-4">Need Pastoral Care?</h5>
            <p class="text-muted fs-14">Our clergy are available for home visitations, hospital prayers, and spiritual guidance.</p>
            <a href="{{ route('contact') }}" class="sigma_btn-custom w-100 text-center">Contact Pastoral Team</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
