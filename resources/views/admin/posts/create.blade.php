@extends('layouts.admin')

@section('title', 'Create News Article')

@section('content')
<div class="mb-4">
  <a href="{{ route('admin.posts.index') }}" class="text-decoration-none text-muted small">
    <i class="fas fa-arrow-left me-1"></i> Back to News Articles
  </a>
  <h3 class="fw-bold mt-2">Publish New Article / News</h3>
</div>

<div class="card">
  <div class="card-body p-4">
    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row g-3">
        <div class="col-md-8">
          <label class="form-label fw-semibold">Article Title <span class="text-danger">*</span></label>
          <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="e.g. Bishop Abraham Matiop Presides Over Diocesan Assembly" required>
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Category <span class="text-danger">*</span></label>
          <select name="category" class="form-select" required>
            <option value="Diocesan News" {{ old('category') == 'Diocesan News' ? 'selected' : '' }}>Diocesan News</option>
            <option value="Bishop's Desk" {{ old('category') == "Bishop's Desk" ? 'selected' : '' }}>Bishop's Desk</option>
            <option value="Mothers' Union" {{ old('category') == "Mothers' Union" ? 'selected' : '' }}>Mothers' Union</option>
            <option value="Youth & Ministry" {{ old('category') == 'Youth & Ministry' ? 'selected' : '' }}>Youth & Ministry</option>
            <option value="Community & Mission" {{ old('category') == 'Community & Mission' ? 'selected' : '' }}>Community & Mission</option>
            <option value="Synod Announcement" {{ old('category') == 'Synod Announcement' ? 'selected' : '' }}>Synod Announcement</option>
          </select>
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Author</label>
          <input type="text" name="author" class="form-control" value="{{ old('author', 'Diocese of Jalle Communications') }}" placeholder="e.g. Diocesan Secretariat">
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Featured Image</label>
          <input type="file" name="image_file" class="form-control" accept="image/*">
          <small class="text-muted">Accepted formats: JPEG, PNG, WebP (Max 5MB)</small>
        </div>

        <div class="col-12">
          <label class="form-label fw-semibold">Short Excerpt / Summary</label>
          <textarea name="excerpt" class="form-control" rows="2" placeholder="Brief summary displayed on listings and home page...">{{ old('excerpt') }}</textarea>
        </div>

        <div class="col-12">
          <label class="form-label fw-semibold">Full Article Content <span class="text-danger">*</span></label>
          <textarea name="content" class="form-control" rows="10" placeholder="Type full story or pastoral update here..." required>{{ old('content') }}</textarea>
        </div>

        <div class="col-12">
          <div class="form-check form-switch mt-2">
            <input class="form-check-input" type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', 1) ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="is_published">Publish immediately on the website</label>
          </div>
        </div>

        <div class="col-12 pt-3 border-top d-flex gap-2">
          <button type="submit" class="btn btn-primary px-4">
            <i class="fas fa-save me-1"></i> Save and Publish
          </button>
          <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
