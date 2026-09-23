@extends('layouts.app')

@section('title', 'Support Our Mission - Giving')
@section('meta_description', 'Support the Christian mission, church reconstruction, theological education, and community flood relief programs of the Diocese of Jalle in Jonglei State, South Sudan.')

@section('content')
<!-- Subheader Start -->
  <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url('{{ asset('assets/img/subheader.webp') }}')">
    <div class="container">
      <div class="sigma_subheader-inner">
        <div class="sigma_subheader-text">
          <h1>Support Our Mission</h1>
          <p class="blockquote light">Diocese of Jalle — Jonglei Internal Province, Episcopal Church of South Sudan (ECSS)</p>
        </div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn-link" href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Donation</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- Subheader End -->

  <div class="section">
    <div class="container">
      <div class="row align-items-center mb-5">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <img loading="lazy" src="{{ asset('assets/img/diocese/fellowship-assembly.jpeg') }}" alt="Support Diocese of Jalle" class="w-100 rounded shadow">
        </div>
        <div class="col-lg-6">
          <div class="ps-lg-4">
            <div class="section-title text-start mb-3">
              <p class="subtitle">Partners In Christ</p>
              <h4 class="title">Support the Ministry of the Diocese of Jalle</h4>
            </div>
            <p class="blockquote bg-transparent border-start border-primary border-3 ps-3 mb-3">
              "Each of you should give what you have decided in your heart to give, not reluctantly or under compulsion, for God loves a cheerful giver." — 2 Corinthians 9:7
            </p>
            <p>
              Your gifts and prayers directly sustain our pastors, support church reconstruction in flood-prone payams, empower the Mothers' Union in rural literacy programs, and provide emergency relief food for displaced families.
            </p>
            <div class="p-3 bg-light rounded border">
              <p class="mb-1 text-dark"><strong>Diocesan Bank / Giving Inquiries:</strong></p>
              <p class="mb-0 text-muted">Please contact the Diocesan Office at <a href="mailto:info@dioceseofjalle.org" class="custom-primary fw-bold">info@dioceseofjalle.org</a> to receive official account details for direct bank transfer or international wire.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Donation Form Section -->
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="sigma_box bg-white border p-4 p-md-5 rounded shadow-sm">
            <h4 class="text-center mb-4">Make a Pledge or Donation</h4>
            <form action="contact-us.html" method="get">
              <div class="mb-3">
                <label class="form-label fw-bold">Select Giving Cause</label>
                <select class="form-select form-control" name="cause">
                  <option value="general">Diocesan General Mission & Ministry</option>
                  <option value="churches">Church Sanctuary Reconstruction</option>
                  <option value="relief">Emergency Flood Disaster Relief</option>
                  <option value="mothers-union">Mothers' Union Family & Literacy Outreach</option>
                  <option value="theology">Clergy Training & Theological Education</option>
                </select>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label fw-bold">Full Name</label>
                  <input type="text" class="form-control" placeholder="Your full name" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label fw-bold">Email Address</label>
                  <input type="email" class="form-control" placeholder="Your email address" required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label fw-bold">Phone / WhatsApp Number</label>
                  <input type="text" class="form-control" placeholder="+211 / International number">
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label fw-bold">Pledge / Donation Amount (USD / SSP)</label>
                  <input type="text" class="form-control" placeholder="e.g. $50, $100, $500">
                </div>
              </div>
              <div class="mb-4">
                <label class="form-label fw-bold">Personal Note or Prayer Request</label>
                <textarea class="form-control" rows="4" placeholder="Share your message or prayer request with the Bishop and clergy..."></textarea>
              </div>
              <button type="submit" class="sigma_btn-custom w-100 text-center">Submit Donation / Pledge Details</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
