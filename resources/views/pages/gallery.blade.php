@extends('layouts.app')

@section('title', 'Photo Gallery - Diocese of Jalle')
@section('meta_description', 'View photo galleries of the Diocese of Jalle: episcopal confirmations, Mothers\' Union conferences, Sunday choir processions, youth rallies, and parish fellowship.')

@section('content')
<!-- Subheader Start -->
<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url('{{ asset('assets/img/subheader.webp') }}')">
  <div class="container">
    <div class="sigma_subheader-inner">
      <div class="sigma_subheader-text">
        <h1>Diocesan Photo Gallery</h1>
        <p class="blockquote light">Moments of Faith, Fellowship & Ministry across the Diocese of Jalle</p>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="btn-link" href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Photo Gallery</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<!-- Subheader End -->

<!-- Gallery Start -->
<div class="section section-padding">
  <div class="container">

    <!-- Category Filter Tabs -->
    <div class="text-center mb-5">
      <ul class="nav nav-pills justify-content-center flex-wrap gap-2" id="galleryTabs">
        <li class="nav-item">
          <a class="nav-link {{ !request('category') ? 'active' : '' }}" href="{{ route('gallery') }}">All Photos</a>
        </li>
        @foreach(['Episcopal Ministry','Mothers\' Union','Worship & Choir','Youth','Community Fellowship'] as $cat)
        <li class="nav-item">
          <a class="nav-link {{ request('category') == $cat ? 'active' : '' }}" href="{{ route('gallery', ['category' => $cat]) }}">{{ $cat }}</a>
        </li>
        @endforeach
      </ul>
    </div>

    @if($photos->count())
    <div class="row g-3" id="gallery-grid">
    @foreach($photos as $photo)
      @php
        $imgUrl = Str::startsWith($photo->image, ['assets/', 'http://', 'https://'])
          ? asset($photo->image)
          : asset('storage/' . $photo->image);
      @endphp
      <div class="col-lg-4 col-md-6">
        <a href="{{ $imgUrl }}" class="gallery-lightbox d-block overflow-hidden rounded shadow-sm position-relative" data-caption="{{ $photo->title }}">
          <div style="height: 240px; overflow: hidden;">
            <img loading="lazy"
                 src="{{ $imgUrl }}"
                 alt="{{ $photo->title }}"
                 class="w-100 h-100"
                 style="object-fit: cover; object-position: center; transition: transform 0.4s ease;">
          </div>
          <div class="position-absolute bottom-0 start-0 end-0 p-3"
               style="background: linear-gradient(transparent, rgba(0,0,0,0.7));">
            <p class="text-white mb-0 fw-semibold small">{{ $photo->title }}</p>
          </div>
          <div class="position-absolute top-50 start-50 translate-middle text-white opacity-0 gallery-zoom-icon"
               style="transition: opacity 0.3s ease; font-size: 22px; pointer-events: none;">
            <i class="fas fa-search-plus"></i>
          </div>
        </a>
      </div>
      @endforeach
    </div>

    @if($photos->hasPages())
      <div class="d-flex justify-content-center mt-5">
        {{ $photos->links() }}
      </div>
    @endif

    @else
    <div class="text-center py-5">
      <i class="fas fa-camera fa-3x text-muted mb-3 d-block"></i>
      <h5 class="text-muted">No photos published yet</h5>
      <p class="text-muted">Check back soon — the diocese regularly shares moments of worship, fellowship, and ministry.</p>
      <a href="{{ route('home') }}" class="sigma_btn-custom mt-2">Return to Homepage</a>
    </div>
    @endif

  </div>
</div>
<!-- Gallery End -->

@push('scripts')
<script>
// Hover zoom effect
document.querySelectorAll('.gallery-lightbox').forEach(function(el) {
  var img = el.querySelector('img');
  var icon = el.querySelector('.gallery-zoom-icon');
  el.addEventListener('mouseenter', function() {
    if(img) img.style.transform = 'scale(1.07)';
    if(icon) icon.style.opacity = '1';
  });
  el.addEventListener('mouseleave', function() {
    if(img) img.style.transform = 'scale(1)';
    if(icon) icon.style.opacity = '0';
  });
});

// Simple lightbox using browser native
document.querySelectorAll('.gallery-lightbox').forEach(function(link) {
  link.addEventListener('click', function(e) {
    e.preventDefault();
    var src = this.getAttribute('href');
    var caption = this.getAttribute('data-caption') || '';
    var overlay = document.createElement('div');
    overlay.style.cssText = 'position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.9);z-index:9999;display:flex;align-items:center;justify-content:center;flex-direction:column;cursor:zoom-out;';
    var imgEl = document.createElement('img');
    imgEl.src = src;
    imgEl.style.cssText = 'max-width:90vw;max-height:80vh;border-radius:6px;box-shadow:0 4px 30px rgba(0,0,0,0.5);';
    var capEl = document.createElement('p');
    capEl.textContent = caption;
    capEl.style.cssText = 'color:#fff;margin-top:12px;font-size:15px;text-align:center;';
    var closeBtn = document.createElement('button');
    closeBtn.textContent = 'x';
    closeBtn.style.cssText = 'position:absolute;top:20px;right:28px;background:none;border:none;color:#fff;font-size:28px;cursor:pointer;';
    overlay.appendChild(closeBtn);
    overlay.appendChild(imgEl);
    overlay.appendChild(capEl);
    document.body.appendChild(overlay);
    overlay.addEventListener('click', function() { document.body.removeChild(overlay); });
    closeBtn.addEventListener('click', function(ev) { ev.stopPropagation(); document.body.removeChild(overlay); });
  });
});
</script>
<style>
#galleryTabs .nav-link { border-radius: 25px; padding: 7px 20px; border: 1px solid #ddd; color: #555; background: #fff; }
#galleryTabs .nav-link.active { background: var(--mht-primary, #1a4a7a); color: #fff; border-color: var(--mht-primary, #1a4a7a); }
</style>
@endpush
@endsection
