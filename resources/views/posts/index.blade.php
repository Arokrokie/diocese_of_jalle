@extends('layouts.app')

@section('title', 'Diocesan News & Announcements')

@section('content')
<!-- Subheader Start -->
<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url('{{ asset('assets/img/subheader.webp') }}')">
  <div class="container">
    <div class="sigma_subheader-inner">
      <div class="sigma_subheader-text">
        <h1>Diocesan News & Updates</h1>
        <p class="blockquote light">Current events, official statements, and stories from across the Diocese of Jalle</p>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="btn-link" href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">News</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<!-- Subheader End -->

<!-- News Section Start -->
<div class="section section-padding">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="row">
          @forelse($posts as $post)
            <div class="col-md-6 mb-4">
              <article class="sigma_post bg-white rounded overflow-hidden shadow-sm h-100 d-flex flex-column border">
                <div class="sigma_post-thumb">
                  <a href="{{ route('news.show', $post->slug) }}">
                    @php
                      $postImg = $post->image
                        ? (Str::startsWith($post->image, ['assets/', 'http://', 'https://']) ? asset($post->image) : asset('storage/' . $post->image))
                        : asset('assets/img/diocese/bishop-and-clergy.jpeg');
                    @endphp
                    <img loading="lazy" src="{{ $postImg }}" alt="{{ $post->title }}" style="height: 220px; width: 100%; object-fit: cover;">
                  </a>
                </div>
                <div class="sigma_post-body p-4 d-flex flex-column flex-grow-1">
                  <div class="sigma_post-meta mb-2 d-flex justify-content-between align-items-center">
                    <span class="custom-primary"><i class="far fa-calendar me-1"></i> {{ $post->created_at->format('M d, Y') }}</span>
                    <span class="badge bg-light text-dark border">{{ $post->category }}</span>
                  </div>
                  <h5 class="mb-2">
                    <a href="{{ route('news.show', $post->slug) }}" class="text-dark">{{ $post->title }}</a>
                  </h5>
                  <p class="text-muted fs-14 mb-3 flex-grow-1">{{ Str::limit($post->excerpt ?: strip_tags($post->content), 120) }}</p>
                  <a href="{{ route('news.show', $post->slug) }}" class="fw-bold fs-14 custom-primary mt-auto">Read Full Story <i class="far fa-arrow-right ms-1"></i></a>
                </div>
              </article>
            </div>
          @empty
            <div class="col-12 text-center py-5">
              <p class="text-muted">No news articles published yet.</p>
            </div>
          @endforelse
        </div>

        @if($posts->hasPages())
          <div class="d-flex justify-content-center mt-4">
            {{ $posts->links() }}
          </div>
        @endif
      </div>

      <!-- Sidebar -->
      <div class="col-lg-4 mt-5 mt-lg-0">
        <div class="sidebar">
          <div class="sidebar-widget p-4 rounded bg-light border mb-4">
            <h5 class="widget-title">About the Diocese</h5>
            <p class="text-muted fs-14 mb-0">
              The Diocese of Jalle is an active area diocese within the Jonglei Internal Province of the Episcopal Church of South Sudan (ECSS), ministering under the leadership of Rt. Rev. Abraham Matiop Deng Kechdit.
            </p>
          </div>

          <div class="sidebar-widget p-4 rounded bg-light border mb-4">
            <h5 class="widget-title">Categories</h5>
            <ul class="list-unstyled mb-0">
              <li class="py-2 border-bottom"><a href="{{ route('news') }}" class="text-dark d-flex justify-content-between">Diocesan News <i class="fas fa-chevron-right text-muted small"></i></a></li>
              <li class="py-2 border-bottom"><a href="{{ route('news') }}" class="text-dark d-flex justify-content-between">Bishop's Desk <i class="fas fa-chevron-right text-muted small"></i></a></li>
              <li class="py-2 border-bottom"><a href="{{ route('news') }}" class="text-dark d-flex justify-content-between">Mothers' Union <i class="fas fa-chevron-right text-muted small"></i></a></li>
              <li class="py-2 border-bottom"><a href="{{ route('news') }}" class="text-dark d-flex justify-content-between">Youth & Ministry <i class="fas fa-chevron-right text-muted small"></i></a></li>
              <li class="py-2"><a href="{{ route('news') }}" class="text-dark d-flex justify-content-between">Community & Mission <i class="fas fa-chevron-right text-muted small"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- News Section End -->
@endsection
