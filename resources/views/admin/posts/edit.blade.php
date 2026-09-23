@extends('layouts.admin')

@section('title', 'Edit News Article')

@section('content')
<div class="mb-4">
  <a href="{{ route('admin.posts.index') }}" class="text-decoration-none text-muted small">
    <i class="fas fa-arrow-left me-1"></i> Back to News Articles
  </a>
  <h3 class="fw-bold mt-2">Edit Article: {{ $post->title }}</h3>
</div>

<div class="card">
  <div class="card-body p-4">
    <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row g-3">
        <div class="col-md-8">
          <label class="form-label fw-semibold">Article Title <span class="text-danger">*</span></label>
          <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}" required>
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Category <span class="text-danger">*</span></label>
          <select name="category" class="form-select" required>
            @php $cat = old('category', $post->category); @endphp
            <option value="Diocesan News" {{ $cat == 'Diocesan News' ? 'selected' : '' }}>Diocesan News</option>
            <option value="Bishop's Desk" {{ $cat == "Bishop's Desk" ? 'selected' : '' }}>Bishop's Desk</option>
            <option value="Mothers' Union" {{ $cat == "Mothers' Union" ? 'selected' : '' }}>Mothers' Union</option>
            <option value="Youth & Ministry" {{ $cat == 'Youth & Ministry' ? 'selected' : '' }}>Youth & Ministry</option>
            <option value="Community & Mission" {{ $cat == 'Community & Mission' ? 'selected' : '' }}>Community & Mission</option>
            <option value="Synod Announcement" {{ $cat == 'Synod Announcement' ? 'selected' : '' }}>Synod Announcement</option>
          </select>
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Author</label>
          <input type="text" name="author" class="form-control" value="{{ old('author', $post->author) }}">
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Featured Image</label>
          @if($post->image)
            <div class="mb-2">
              <img src="{{ asset('storage/' . $post->image) }}" alt="Preview" class="rounded border" style="max-height: 80px;">
              <small class="text-muted d-block">Current image. Uploading a new file will replace it.</small>
            </div>
          @endif
          <input type="file" name="image_file" class="form-control" accept="image/*">
          <small class="text-muted">Accepted formats: JPEG, PNG, WebP (Max 5MB)</small>
        </div>

        <div class="col-12">
          <label class="form-label fw-semibold">Short Excerpt / Summary</label>
          <textarea name="excerpt" class="form-control" rows="2">{{ old('excerpt', $post->excerpt) }}</textarea>
        </div>

        <div class="col-12">
          <label class="form-label fw-semibold">Full Article Content <span class="text-danger">*</span></label>
          <textarea name="content" class="form-control rich-editor" rows="10" required>{{ old('content', $post->content) }}</textarea>
        </div>

        <div class="col-12">
          <div class="form-check form-switch mt-2">
            <input class="form-check-input" type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', $post->is_published) ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="is_published">Publish immediately on the website</label>
          </div>
        </div>

        <div class="col-12 pt-3 border-top d-flex gap-2">
          <button type="submit" class="btn btn-primary px-4">
            <i class="fas fa-save me-1"></i> Update Article
          </button>
          <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
