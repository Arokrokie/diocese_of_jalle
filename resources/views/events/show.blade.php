@extends('layouts.app')

@section('title', $event->title)
@php
  $eventDesc = Str::limit(strip_tags($event->description), 160);
  $eventImgUrl = $event->image
    ? (Str::startsWith($event->image, ['assets/', 'http://', 'https://']) ? asset($event->image) : asset('storage/' . $event->image))
    : asset('assets/img/diocese/diocese-event-1.jpeg');
@endphp
@section('meta_description', $eventDesc)
@section('og_type', 'event')
@section('og_title', $event->title)
@section('og_description', $eventDesc)
@section('og_image', $eventImgUrl)

@section('content')
<!-- Subheader Start -->
<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url('{{ asset('assets/img/subheader.webp') }}')">
  <div class="container">
    <div class="sigma_subheader-inner">
      <div class="sigma_subheader-text">
        <h1 class="text-white">{{ $event->title }}</h1>
        <p class="blockquote light">{{ $event->location }} • {{ $event->start_date ? $event->start_date->format('F d, Y') : '' }}</p>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="btn-link" href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item"><a class="btn-link" href="{{ route('events') }}">Events</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($event->title, 25) }}</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<!-- Subheader End -->

<!-- Event Details Start -->
<div class="section section-padding">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="event-details">
          <div class="event-thumbnail mb-4">
            @php
              $eventImg = $event->image
                ? (Str::startsWith($event->image, ['assets/', 'http://', 'https://']) ? asset($event->image) : asset('storage/' . $event->image))
                : asset('assets/img/diocese/diocese-event-1.jpeg');
            @endphp
            <img src="{{ $eventImg }}" alt="{{ $event->title }}" class="w-100 rounded shadow-sm" style="max-height: 440px; object-fit: cover;">
          </div>

          <div class="p-4 bg-light rounded border mb-4">
            <div class="row g-3">
              <div class="col-md-6">
                <small class="text-muted text-uppercase fw-semibold d-block">Start Date & Time</small>
                <strong>{{ $event->start_date ? $event->start_date->format('F d, Y 	 h:i A') : 'TBD' }}</strong>
              </div>
              <div class="col-md-6">
                <small class="text-muted text-uppercase fw-semibold d-block">End Date & Time</small>
                <strong>{{ $event->end_date ? $event->end_date->format('F d, Y 	 h:i A') : 'Same day / As announced' }}</strong>
              </div>
              <div class="col-md-6 pt-2 border-top">
                <small class="text-muted text-uppercase fw-semibold d-block">Venue Location</small>
                <span class="text-danger fw-semibold"><i class="fas fa-map-marker-alt me-1"></i> {{ $event->location }}</span>
              </div>
              <div class="col-md-6 pt-2 border-top">
                <small class="text-muted text-uppercase fw-semibold d-block">Contact / Organizing Committee</small>
                <span><i class="fas fa-user me-1 text-primary"></i> {{ $event->contact_person ?: 'Diocesan Secretariat' }}</span>
              </div>
            </div>
          </div>

          <div class="event-content mb-5" style="line-height: 1.85; font-size: 16px;">
            <h5 class="mb-3">About this Gathering</h5>
            {!! nl2br(e($event->description)) !!}
          </div>

          <div class="pt-3 border-top">
            <a href="{{ route('events') }}" class="btn btn-outline-secondary btn-sm">
              <i class="fas fa-arrow-left me-1"></i> Back to All Events
            </a>
          </div>
        </div>
      </div>

      <!-- Sidebar -->
      <div class="col-lg-4 mt-5 mt-lg-0">
        <div class="sidebar">
          <div class="sidebar-widget p-4 rounded bg-light border mb-4">
            <h5 class="widget-title">Other Upcoming Events</h5>
            <ul class="list-unstyled mb-0">
              @forelse($upcomingEvents as $ue)
                <li class="mb-3 pb-3 border-bottom">
                  <a href="{{ route('event.show', $ue->slug) }}" class="fw-semibold text-dark text-decoration-none d-block mb-1">{{ $ue->title }}</a>
                  <small class="text-muted"><i class="far fa-calendar me-1"></i> {{ $ue->start_date ? $ue->start_date->format('M d, Y') : '' }} &bull; {{ $ue->location }}</small>
                </li>
              @empty
                <li class="text-muted small">No other events scheduled.</li>
              @endforelse
            </ul>
          </div>

          <div class="sidebar-widget p-4 rounded primary-bg text-white shadow-sm">
            <h5 class="text-white mb-2">Need Event Information?</h5>
            <p class="text-white-50 small mb-3">Get in touch with our diocesan coordination office for registration or travel guidance to Jalle.</p>
            <a href="{{ route('contact') }}" class="sigma_btn-custom secondary btn-sm">Contact Secretariat</a>
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
  "@@type": "Event",
  "name": {{ json_encode($event->title) }},
  "description": {{ json_encode($eventDesc) }},
  "startDate": "{{ $event->start_date ? $event->start_date->toIso8601String() : '' }}",
  "endDate": "{{ ($event->end_date ?: $event->start_date) ? ($event->end_date ?: $event->start_date)->toIso8601String() : '' }}",
  "eventStatus": "https://schema.org/EventScheduled",
  "eventAttendanceMode": "https://schema.org/OfflineEventAttendanceMode",
  "location": {
    "@@type": "Place",
    "name": {{ json_encode($event->location ?: 'Diocese of Jalle') }},
    "address": {
      "@@type": "PostalAddress",
      "addressLocality": "Jalle Payam, Bor County",
      "addressRegion": "Jonglei State",
      "addressCountry": "SS"
    }
  },
  "image": [{{ json_encode($eventImgUrl) }}],
  "organizer": {
    "@@type": "ReligiousOrganization",
    "name": "Diocese of Jalle - Episcopal Church of South Sudan",
    "url": "{{ url('/') }}"
  }
}
</script>
@endpush
