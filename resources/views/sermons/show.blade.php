@extends('layouts.app')

@section('title', $sermon->title)

@section('content')
<!-- Subheader Start -->
<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url('{{ asset('assets/img/subheader.webp') }}')">
  <div class="container">
    <div class="sigma_subheader-inner">
      <div class="sigma_subheader-text">
        <h1 class="text-white">{{ $sermon->title }}</h1>
        <p class="blockquote light">{{ $sermon->preacher }} • {{ $sermon->sermon_date ? $sermon->sermon_date->format('F d, Y') : '' }}</p>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="btn-link" href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item"><a class="btn-link" href="{{ route('sermons') }}">Sermons</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($sermon->title, 25) }}</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<!-- Subheader End -->

<!-- Sermon Details Start -->
<div class="section section-padding">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="sermon-details">
          @if($sermon->image)
            <div class="sermon-thumbnail mb-4">
              <img src="{{ asset('storage/' . $sermon->image) }}" alt="{{ $sermon->title }}" class="w-100 rounded shadow-sm">
            </div>
          @endif

          <div class="p-4 bg-light rounded border mb-4">
            <div class="row g-3">
              <div class="col-md-6">
                <small class="text-muted text-uppercase fw-semibold d-block">Preacher</small>
                <strong>{{ $sermon->preacher }}</strong>
              </div>
              <div class="col-md-6">
                <small class="text-muted text-uppercase fw-semibold d-block">Date Preached</small>
                <strong>{{ $sermon->sermon_date ? $sermon->sermon_date->format('F d, Y') : 'Not specified' }}</strong>
              </div>
              @if($sermon->scripture)
                <div class="col-12 pt-2 border-top">
                  <small class="text-muted text-uppercase fw-semibold d-block">Scripture Reference</small>
                  <span class="text-primary fw-bold fs-16"><i class="fas fa-bookmark me-1"></i> {{ $sermon->scripture }}</span>
                </div>
              @endif
            </div>
          </div>

          @if($sermon->audio_url)
            <div class="p-3 bg-white border rounded shadow-sm mb-4">
              <h6 class="mb-2"><i class="fas fa-headphones text-primary me-2"></i> Audio Sermon Stream</h6>
              <audio controls class="w-100">
                <source src="{{ $sermon->audio_url }}" type="audio/mpeg">
                Your browser does not support the audio element.
              </audio>
            </div>
          @endif

          @if($sermon->video_url)
            <div class="p-3 bg-white border rounded shadow-sm mb-4">
              <h6 class="mb-2"><i class="fas fa-video text-danger me-2"></i> Watch Video Stream</h6>
              <a href="{{ $sermon->video_url }}" target="_blank" class="btn btn-danger btn-sm">
                <i class="fas fa-play me-1"></i> Watch on External Video Player
              </a>
            </div>
          @endif

          @if($sermon->description)
            <div class="sermon-description mb-4">
              <h5 class="mb-3">Message Overview</h5>
              <div class="lead fw-normal text-muted" style="line-height: 1.8;">
                {!! nl2br(e($sermon->description)) !!}
              </div>
            </div>
          @endif

          @if($sermon->notes)
            <div class="sermon-notes pt-4 border-top mb-5">
              <h5 class="mb-3">Sermon Notes & Scripture Study</h5>
              <div class="p-4 bg-light rounded border" style="line-height: 1.85; font-size: 15px;">
                {!! nl2br(e($sermon->notes)) !!}
              </div>
            </div>
          @endif

          <div class="pt-3 border-top">
            <a href="{{ route('sermons') }}" class="btn btn-outline-secondary btn-sm">
              <i class="fas fa-arrow-left me-1"></i> Back to Sermon Archive
            </a>
          </div>
        </div>
      </div>

      <!-- Sidebar -->
      <div class="col-lg-4 mt-5 mt-lg-0">
        <div class="sidebar">
          <div class="sidebar-widget p-4 rounded bg-light border mb-4">
            <h5 class="widget-title">Other Recent Sermons</h5>
            <ul class="list-unstyled mb-0">
              @forelse($recentSermons as $rs)
                <li class="mb-3 pb-3 border-bottom">
                  <a href="{{ route('sermon.show', $rs->slug) }}" class="fw-semibold text-dark text-decoration-none d-block mb-1">{{ $rs->title }}</a>
                  <small class="text-muted"><i class="fas fa-user-circle me-1"></i> {{ $rs->preacher }} &bull; {{ $rs->sermon_date ? $rs->sermon_date->format('M d') : '' }}</small>
                </li>
              @empty
                <li class="text-muted small">No other recent sermons.</li>
              @endforelse
            </ul>
          </div>

          <div class="sidebar-widget p-4 rounded primary-bg text-white shadow-sm">
            <h5 class="text-white mb-2">Join Sunday Worship</h5>
            <p class="text-white-50 small mb-3">All are welcome to fellowship with us in prayer, scripture, and Holy Communion across Jalle Payam.</p>
            <a href="{{ route('services') }}" class="sigma_btn-custom secondary btn-sm">Worship Schedule</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Sermon Details End -->
@endsection
