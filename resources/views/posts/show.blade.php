@extends('layouts.app')

@section('title', $post->title)
@php
  $postDesc = Str::limit(strip_tags($post->excerpt ?: $post->content), 160);
  $postImgUrl = $post->image
    ? (Str::startsWith($post->image, ['assets/', 'http://', 'https://']) ? asset($post->image) : asset('storage/' . $post->image))
    : asset('assets/img/diocese/bishop-and-clergy.jpeg');
@endphp
@section('meta_description', $postDesc)
@section('og_type', 'article')
@section('og_title', $post->title)
@section('og_description', $postDesc)
@section('og_image', $postImgUrl)

@section('content')
<!-- Subheader Start -->
<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url('{{ asset('assets/img/subheader.webp') }}')">
  <div class="container">
    <div class="sigma_subheader-inner">
      <div class="sigma_subheader-text">
        <h1 class="text-white">{{ $post->title }}</h1>
        <p class="blockquote light">{{ $post->category }} • Published {{ $post->created_at->format('F d, Y') }}</p>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="btn-link" href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item"><a class="btn-link" href="{{ route('news') }}">News</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($post->title, 25) }}</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<!-- Subheader End -->

<!-- Article Section Start -->
<div class="section section-padding">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <article class="post-details">
          <div class="post-thumbnail mb-4">
            @php
              $postImg = $post->image
                ? (Str::startsWith($post->image, ['assets/', 'http://', 'https://']) ? asset($post->image) : asset('storage/' . $post->image))
                : asset('assets/img/diocese/bishop-and-clergy.jpeg');
            @endphp
            <img src="{{ $postImg }}" alt="{{ $post->title }}" class="w-100 rounded shadow-sm" style="max-height: 440px; object-fit: cover;">
          </div>

          <div class="post-meta mb-3 pb-3 border-bottom d-flex align-items-center gap-3 text-muted small">
            <span><i class="far fa-calendar-alt text-primary me-1"></i> {{ $post->created_at->format('F d, Y') }}</span>
            <span><i class="far fa-user text-primary me-1"></i> {{ $post->author }}</span>
            <span class="badge bg-secondary">{{ $post->category }}</span>
          </div>

          @if($post->excerpt)
            <div class="lead fw-normal text-muted mb-4 border-start border-primary border-3 ps-3">
              {{ $post->excerpt }}
            </div>
          @endif

          <div class="post-content mb-5" style="line-height: 1.85; font-size: 16px;">
            {!! Str::contains($post->content, ['<p>', '<br', '<div>']) ? $post->content : nl2br(e($post->content)) !!}
          </div>

          <div class="post-footer pt-3 border-top d-flex justify-content-between align-items-center">
            <a href="{{ route('news') }}" class="btn btn-outline-secondary btn-sm">
              <i class="fas fa-arrow-left me-1"></i> Back to News Archive
            </a>
            <div class="d-flex align-items-center gap-2">
              <span class="small text-muted">Share:</span>
              <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="btn btn-sm btn-outline-primary"><i class="fab fa-facebook-f"></i></a>
              <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($post->title) }}" target="_blank" class="btn btn-sm btn-outline-info"><i class="fab fa-twitter"></i></a>
            </div>
          </div>
        </article>
      </div>

      <!-- Sidebar -->
      <div class="col-lg-4 mt-5 mt-lg-0">
        <div class="sidebar">
          <div class="sidebar-widget p-4 rounded bg-light border mb-4">
            <h5 class="widget-title">Recent Articles</h5>
            <ul class="list-unstyled mb-0">
              @forelse($recentPosts as $rp)
                <li class="mb-3 pb-3 border-bottom">
                  <a href="{{ route('news.show', $rp->slug) }}" class="fw-semibold text-dark text-decoration-none d-block mb-1">{{ $rp->title }}</a>
                  <small class="text-muted"><i class="far fa-calendar me-1"></i> {{ $rp->created_at->format('M d, Y') }}</small>
                </li>
              @empty
                <li class="text-muted small">No other recent articles.</li>
              @endforelse
            </ul>
          </div>

          <div class="sidebar-widget p-4 rounded primary-bg text-white shadow-sm">
            <h5 class="text-white mb-2">Join Our Fellowship</h5>
            <p class="text-white-50 small mb-3">All are welcome to join us in Sunday worship across our parishes in Jalle Payam.</p>
            <a href="{{ route('contact') }}" class="sigma_btn-custom secondary btn-sm">Contact Pastoral Team</a>
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
  "@@type": "NewsArticle",
  "headline": {{ json_encode($post->title) }},
  "description": {{ json_encode($postDesc) }},
  "image": [{{ json_encode($postImgUrl) }}],
  "datePublished": "{{ $post->created_at->toIso8601String() }}",
  "dateModified": "{{ ($post->updated_at ?: $post->created_at)->toIso8601String() }}",
  "author": {
    "@@type": "Organization",
    "name": "Diocese of Jalle",
    "url": "{{ url('/') }}"
  },
  "publisher": {
    "@@type": "ReligiousOrganization",
    "name": "Diocese of Jalle - Episcopal Church of South Sudan",
    "logo": {
      "@@type": "ImageObject",
      "url": "{{ asset('assets/img/diocese/crest.png') }}"
    }
  },
  "mainEntityOfPage": {
    "@@type": "WebPage",
    "@@id": "{{ route('news.show', $post->slug) }}"
  }
}
</script>
@endpush
