@extends('layouts.app')

@section('title', $sermon->title)
@php
  $sermonDesc = Str::limit(strip_tags($sermon->description ?: ($sermon->preacher . ' preaching on ' . $sermon->scripture)), 160);
  $sermonImgUrl = $sermon->image
    ? (Str::startsWith($sermon->image, ['assets/', 'http://', 'https://']) ? asset($sermon->image) : asset('storage/' . $sermon->image))
    : asset('assets/img/diocese/open-bible.webp');
@endphp
@section('meta_description', $sermonDesc)
@section('og_type', 'article')
@section('og_title', $sermon->title)
@section('og_description', $sermonDesc)
@section('og_image', $sermonImgUrl)

@section('content')
<!-- Subheader Start -->
<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url('{{ asset('assets/img/subheader.webp') }}')">
  <div class="container">
    <div class="sigma_subheader-inner">
      <div class="sigma_subheader-text">
        <h1 class="text-white">{{ $sermon->title }}</h1>
        <p class="blockquote light">{{ $sermon->preacher }} &bull; {{ $sermon->sermon_date ? $sermon->sermon_date->format('F d, Y') : '' }}</p>
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
          <!-- Thumbnail (default to open-bible if none uploaded) -->
          <div class="sermon-thumbnail mb-4">
            @if($sermon->image)
              <img src="{{ asset('storage/' . $sermon->image) }}" alt="{{ $sermon->title }}" class="w-100 rounded shadow-sm" style="max-height:340px; object-fit:cover;">
            @else
              <img src="{{ asset('assets/img/diocese/open-bible.webp') }}" alt="Open Bible" class="w-100 rounded shadow-sm" style="max-height:340px; object-fit:cover;">
            @endif
          </div>

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
              <h5 class="mb-3">Sermon Notes &amp; Scripture Study</h5>
              <div class="p-4 bg-light rounded border" style="line-height: 1.85; font-size: 15px;">
                {!! $sermon->notes !!}
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
@endsection

@push('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "CreativeWork",
  "name": {{ json_encode($sermon->title) }},
  "description": {{ json_encode($sermonDesc) }},
  "author": {
    "@@type": "Person",
    "name": {{ json_encode($sermon->preacher) }}
  },
  "datePublished": "{{ $sermon->sermon_date ? $sermon->sermon_date->toIso8601String() : ($sermon->created_at ? $sermon->created_at->toIso8601String() : '') }}",
  "publisher": {
    "@@type": "ReligiousOrganization",
    "name": "Diocese of Jalle - Episcopal Church of South Sudan",
    "url": "{{ url('/') }}",
    "logo": {
      "@@type": "ImageObject",
      "url": "{{ asset('assets/img/diocese/crest.png') }}"
    }
  },
  "image": [{{ json_encode($sermonImgUrl) }}]
}
</script>
@endpush
