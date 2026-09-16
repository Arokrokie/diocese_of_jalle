@extends('layouts.app')

@section('title', 'Contact Us & Prayer Requests')

@section('content')
<!-- Subheader Start -->
<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url('{{ asset('assets/img/subheader.webp') }}')">
  <div class="container">
    <div class="sigma_subheader-inner">
      <div class="sigma_subheader-text">
        <h1>Contact Diocese of Jalle</h1>
        <p class="blockquote light">Connect with our leadership, pastoral teams, and community outreach office</p>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="btn-link" href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<!-- Subheader End -->

<!-- Contact Section Start -->
<div class="section section-padding">
  <div class="container">
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show p-4 mb-5 shadow-sm" role="alert">
        <h5 class="alert-heading"><i class="fas fa-check-circle me-2"></i> Thank You in the Lord!</h5>
        <p class="mb-0">{{ session('success') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="row">
      <!-- Contact Information Card -->
      <div class="col-lg-5 mb-4 mb-lg-0">
        <div class="p-4 p-md-5 rounded primary-bg text-white h-100 shadow-sm">
          <div class="section-title text-start mb-4">
            <p class="subtitle text-white">Get in Touch</p>
            <h4 class="title text-white">Diocesan Headquarters</h4>
          </div>

          <p class="text-white-50 mb-4">
            We welcome you in the name of our Lord Jesus Christ. For general inquiries, pastoral ministry, marriage blessings, synod communications, or partnership initiatives:
          </p>

          <div class="d-flex align-items-start mb-4">
            <i class="fas fa-map-marker-alt text-white fs-20 me-3 mt-1"></i>
            <div>
              <h6 class="text-white mb-1">Office Location</h6>
              <p class="text-white-50 mb-0">Diocesan Headquarters, Jalle Payam, Bor County, Jonglei State, South Sudan</p>
            </div>
          </div>

          <div class="d-flex align-items-start mb-4">
            <i class="fas fa-envelope text-white fs-20 me-3 mt-1"></i>
            <div>
              <h6 class="text-white mb-1">Official Email</h6>
              <p class="text-white-50 mb-0"><a href="mailto:info@dioceseofjalle.org" class="text-white text-decoration-none">info@dioceseofjalle.org</a></p>
            </div>
          </div>

          <div class="d-flex align-items-start mb-4">
            <i class="fas fa-church text-white fs-20 me-3 mt-1"></i>
            <div>
              <h6 class="text-white mb-1">Provincial Affiliation</h6>
              <p class="text-white-50 mb-0">Jonglei Internal Province — Episcopal Church of South Sudan (ECSS)</p>
            </div>
          </div>

          <div class="d-flex align-items-start">
            <i class="fas fa-clock text-white fs-20 me-3 mt-1"></i>
            <div>
              <h6 class="text-white mb-1">Sunday Worship</h6>
              <p class="text-white-50 mb-0">9:00 AM – 12:30 PM (All Parishes across Jalle)</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Contact / Prayer Request Form -->
      <div class="col-lg-7">
        <div class="p-4 p-md-5 border rounded bg-white shadow-sm">
          <h4>Send Us a Message or Prayer Request</h4>
          <p class="text-muted mb-4">Whether you are seeking pastoral counseling, wishing to partner with our ministries, or sharing a prayer need, we are here for you.</p>

          <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Your Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter your full name" required>
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Email Address <span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter your email" required>
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Phone Number</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="+211 / Phone number">
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Subject</label>
                <select name="subject" class="form-select form-control">
                  <option value="General Inquiry" {{ old('subject') == 'General Inquiry' ? 'selected' : '' }}>General Inquiry</option>
                  <option value="Pastoral Prayer Request" {{ old('subject') == 'Pastoral Prayer Request' ? 'selected' : '' }}>Pastoral Prayer Request</option>
                  <option value="Mothers' Union Inquiry" {{ old('subject') == "Mothers' Union Inquiry" ? 'selected' : '' }}>Mothers' Union Inquiry</option>
                  <option value="Youth & Choir Ministry" {{ old('subject') == 'Youth & Choir Ministry' ? 'selected' : '' }}>Youth & Choir Ministry</option>
                  <option value="Donations & Mission Partnership" {{ old('subject') == 'Donations & Mission Partnership' ? 'selected' : '' }}>Donations & Mission Partnership</option>
                </select>
              </div>
            </div>
            <div class="mb-4">
              <label class="form-label fw-bold">Your Message / Prayer Request <span class="text-danger">*</span></label>
              <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="5" placeholder="Write your message or intercession request here..." required>{{ old('message') }}</textarea>
              @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="sigma_btn-custom">Send Message in Faith</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Contact Section End -->
@endsection
