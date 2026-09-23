@extends('layouts.app')

@section('title', 'Sermons & Pastoral Messages')
@section('meta_description', 'Listen to and read pastoral sermon messages and Bible teachings from the Diocese of Jalle clergy. Grounded in Orthodox Anglican theology and the Holy Scriptures.')

@section('content')
<!-- Subheader Start -->
<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url('{{ asset('assets/img/subheader.webp') }}')">
  <div class="container">
    <div class="sigma_subheader-inner">
      <div class="sigma_subheader-text">
        <h1>Sermons & Spiritual Teachings</h1>
        <p class="blockquote light">Proclaiming the Word of God, reconciliation, and Christian growth across Jalle</p>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="btn-link" href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Sermons</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<!-- Subheader End -->

<!-- Sermons List Start -->
<div class="section section-padding">
  <div class="container">
    <div class="row">
      @forelse($sermons as $sermon)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100 border rounded shadow-sm overflow-hidden d-flex flex-column">
            @if($sermon->image)
              <img src="{{ Str::startsWith($sermon->image, ['assets/', 'http://', 'https://']) ? asset($sermon->image) : asset('storage/' . $sermon->image) }}" alt="{{ $sermon->title }}" class="card-img-top" style="height: 220px; object-fit: cover;">
            @else
              <img src="{{ asset('assets/img/diocese/open-bible.webp') }}" alt="{{ $sermon->title }}" class="card-img-top" style="height: 220px; object-fit: cover;">
            @endif
            <div class="card-body p-4 d-flex flex-column flex-grow-1">
              <div class="d-flex justify-content-between align-items-center text-muted small mb-2">
                <span><i class="far fa-calendar-alt text-primary me-1"></i> {{ $sermon->sermon_date ? $sermon->sermon_date->format('M d, Y') : '' }}</span>
                <span class="text-primary"><i class="fas fa-user-circle me-1"></i> {{ Str::limit($sermon->preacher, 20) }}</span>
              </div>
              <h5 class="card-title mb-2">
                <a href="{{ route('sermon.show', $sermon->slug) }}" class="text-dark text-decoration-none">{{ $sermon->title }}</a>
              </h5>
              @if($sermon->scripture)
                <p class="text-primary small fw-semibold mb-2"><i class="fas fa-bookmark me-1"></i> {{ $sermon->scripture }}</p>
              @endif
              <p class="card-text text-muted small flex-grow-1">
                {{ Str::limit($sermon->description, 130) }}
              </p>
              <div class="pt-3 border-top mt-auto">
                <a href="{{ route('sermon.show', $sermon->slug) }}" class="fw-bold custom-primary fs-14">
                  Read Sermon Message <i class="far fa-arrow-right ms-1"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center py-5">
          <p class="text-muted">No sermons found in the archive right now.</p>
        </div>
      @endforelse
    </div>

    @if($sermons->hasPages())
      <div class="d-flex justify-content-center mt-4">
        {{ $sermons->links() }}
      </div>
    @endif
  </div>
</div>
<!-- Sermons List End -->
@endsection
