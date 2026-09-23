@extends('layouts.admin')

@section('title', 'Upload New Photo')

@section('content')
<div class="mb-4">
  <a href="{{ route('admin.gallery.index') }}" class="text-decoration-none text-muted small">
    <i class="fas fa-arrow-left me-1"></i> Back to Gallery
  </a>
  <h3 class="fw-bold mt-2">Upload New Photo</h3>
</div>

<div class="card">
  <div class="card-body p-4">
    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row g-3">
        <div class="col-md-8">
          <label class="form-label fw-semibold">Photo Title <span class="text-danger">*</span></label>
          <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="e.g. Bishop Abraham Presides Over Jonglei Peace Assembly" required>
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Category</label>
          <select name="category" class="form-select">
            <option value="">-- Select Category --</option>
            @foreach(['Episcopal Ministry','Mothers\' Union','Worship & Choir','Youth','Community Fellowship'] as $cat)
              <option value="{{ $cat }}" {{ old('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
            @endforeach
          </select>
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Photo / Image <span class="text-danger">*</span></label>
          <input type="file" name="image_file" class="form-control" accept="image/*" required>
          <small class="text-muted">JPEG, PNG or WebP. Max 5MB.</small>
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Event Date</label>
          <input type="date" name="event_date" class="form-control" value="{{ old('event_date') }}">
        </div>

        <div class="col-12">
          <label class="form-label fw-semibold">Caption / Description</label>
          <textarea name="caption" class="form-control rich-editor" rows="3" placeholder="Optional short description or caption for this photo...">{{ old('caption') }}</textarea>
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Sort Order</label>
          <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}" min="0">
          <small class="text-muted">Lower number = appears first</small>
        </div>

        <div class="col-12">
          <div class="form-check form-switch mt-2">
            <input class="form-check-input" type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', 1) ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="is_published">Publish this photo on the website immediately</label>
          </div>
        </div>

        <div class="col-12 pt-3 border-top d-flex gap-2">
          <button type="submit" class="btn btn-success px-4">
            <i class="fas fa-upload me-1"></i> Upload Photo
          </button>
          <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
