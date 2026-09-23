@extends('layouts.app')

@section('title', 'Diocesan Events & Assemblies')
@section('meta_description', 'Stay updated on upcoming diocesan events, synods, assemblies, and community gatherings organized by the Diocese of Jalle in Jonglei State, South Sudan.')

@section('content')
<!-- Subheader Start -->
<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url('{{ asset('assets/img/subheader.webp') }}')">
  <div class="container">
    <div class="sigma_subheader-inner">
      <div class="sigma_subheader-text">
        <h1>Diocesan Events &amp; Synods</h1>
        <p class="blockquote light">Gatherings, assemblies, conferences, and fellowships of the Diocese of Jalle</p>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="btn-link" href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Events</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<!-- Subheader End -->

<!-- Events List Start -->
<div class="section section-padding">
  <div class="container">

    <!-- Filter Tabs -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
      <div>
        <ul class="nav nav-pills gap-2">
          <li class="nav-item">
            <a class="nav-link {{ !request('status') || request('status') == 'all' ? 'active' : '' }}"
               href="{{ route('events') }}">
              All <span class="badge bg-white text-dark ms-1">{{ ($upcomingCount ?? 0) + ($completedCount ?? 0) }}</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request('status') == 'upcoming' ? 'active' : '' }}"
               href="{{ route('events', ['status' => 'upcoming']) }}">
              Upcoming <span class="badge bg-white text-dark ms-1">{{ $upcomingCount ?? 0 }}</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request('status') == 'completed' ? 'active' : '' }}"
               href="{{ route('events', ['status' => 'completed']) }}">
              Completed <span class="badge bg-white text-dark ms-1">{{ $completedCount ?? 0 }}</span>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <div class="row">
      @forelse($events as $event)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100 border rounded shadow-sm overflow-hidden d-flex flex-column">
            @php
              $eventImg = $event->image
                ? (Str::startsWith($event->image, ['assets/', 'http://', 'https://']) ? asset($event->image) : asset('storage/' . $event->image))
                : asset('assets/img/diocese/diocese-event-1.jpeg');
            @endphp
            <img src="{{ $eventImg }}" alt="{{ $event->title }}" class="card-img-top" style="height: 220px; object-fit: cover;">
            <div class="card-body p-4 d-flex flex-column flex-grow-1">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex align-items-center text-muted small">
                  <i class="far fa-calendar-alt text-primary me-2"></i>
                  <span>{{ $event->start_date ? $event->start_date->format('M d, Y') : '' }}</span>
                </div>
                @if(method_exists($event, 'getStatusLabelAttribute'))
                  <span class="badge {{ $event->status_badge_class }}">{{ $event->status_label }}</span>
                @elseif($event->start_date && $event->start_date->isPast())
                  <span class="badge bg-secondary">Completed</span>
                @else
                  <span class="badge bg-success">Upcoming</span>
                @endif
              </div>
              <h5 class="card-title mb-2">
                <a href="{{ route('event.show', $event->slug) }}" class="text-dark text-decoration-none">{{ $event->title }}</a>
              </h5>
              <div class="small text-muted mb-3">
                <i class="fas fa-map-marker-alt text-danger me-1"></i> {{ $event->location }}
              </div>
              <p class="card-text text-muted small flex-grow-1">
                {{ Str::limit($event->description, 130) }}
              </p>
              <div class="pt-3 border-top mt-auto">
                <a href="{{ route('event.show', $event->slug) }}" class="fw-bold custom-primary fs-14">
                  Event Details &amp; Schedule <i class="far fa-arrow-right ms-1"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center py-5">
          <i class="fas fa-calendar-times fa-3x text-muted mb-3 d-block"></i>
          <p class="text-muted">No events found for this filter. Check back soon for upcoming assemblies and synods.</p>
          <a href="{{ route('events') }}" class="sigma_btn-custom mt-2">View All Events</a>
        </div>
      @endforelse
    </div>

    @if($events->hasPages())
      <div class="d-flex justify-content-center mt-4">
        {{ $events->links() }}
      </div>
    @endif
  </div>
</div>
<!-- Events List End -->
@endsection
