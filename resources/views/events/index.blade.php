@extends('layouts.app')

@section('title', 'Diocesan Events & Assemblies')

@section('content')
<!-- Subheader Start -->
<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url('{{ asset('assets/img/subheader.webp') }}')">
  <div class="container">
    <div class="sigma_subheader-inner">
      <div class="sigma_subheader-text">
        <h1>Diocesan Events & Synods</h1>
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
    <div class="row">
      @forelse($events as $event)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100 border rounded shadow-sm overflow-hidden d-flex flex-column">
            @if($event->image)
              <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="card-img-top" style="height: 220px; object-fit: cover;">
            @else
              <img src="{{ asset('assets/img/diocese/clergy-full-group.jpeg') }}" alt="{{ $event->title }}" class="card-img-top" style="height: 220px; object-fit: cover;">
            @endif
            <div class="card-body p-4 d-flex flex-column flex-grow-1">
              <div class="d-flex align-items-center text-muted small mb-2">
                <i class="far fa-calendar-alt text-primary me-2"></i>
                <span>{{ $event->start_date ? $event->start_date->format('M d, Y') : '' }}</span>
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
                  Event Details & Schedule <i class="far fa-arrow-right ms-1"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center py-5">
          <p class="text-muted">No events currently scheduled.</p>
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
