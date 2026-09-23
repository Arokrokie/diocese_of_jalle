@extends('layouts.admin')

@section('title', 'Edit Event')

@section('content')
<div class="mb-4">
  <a href="{{ route('admin.events.index') }}" class="text-decoration-none text-muted small">
    <i class="fas fa-arrow-left me-1"></i> Back to Events
  </a>
  <h3 class="fw-bold mt-2">Edit Event: {{ $event->title }}</h3>
</div>

<div class="card">
  <div class="card-body p-4">
    <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row g-3">
        <div class="col-md-8">
          <label class="form-label fw-semibold">Event Title <span class="text-danger">*</span></label>
          <input type="text" name="title" class="form-control" value="{{ old('title', $event->title) }}" required>
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Location / Venue <span class="text-danger">*</span></label>
          <input type="text" name="location" class="form-control" value="{{ old('location', $event->location) }}" required>
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Start Date & Time <span class="text-danger">*</span></label>
          <input type="datetime-local" name="start_date" class="form-control" value="{{ old('start_date', $event->start_date ? $event->start_date->format('Y-m-d\TH:i') : '') }}" required>
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">End Date & Time</label>
          <input type="datetime-local" name="end_date" class="form-control" value="{{ old('end_date', $event->end_date ? $event->end_date->format('Y-m-d\TH:i') : '') }}">
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Contact Person / Department</label>
          <input type="text" name="contact_person" class="form-control" value="{{ old('contact_person', $event->contact_person) }}">
        </div>

        <div class="col-md-12">
          <label class="form-label fw-semibold">Event Poster / Banner Image</label>
          @if($event->image)
            <div class="mb-2">
              <img src="{{ asset('storage/' . $event->image) }}" alt="Preview" class="rounded border" style="max-height: 80px;">
              <small class="text-muted d-block">Current image. Uploading a new file will replace it.</small>
            </div>
          @endif
          <input type="file" name="image_file" class="form-control" accept="image/*">
          <small class="text-muted">Accepted formats: JPEG, PNG, WebP (Max 5MB)</small>
        </div>

        <div class="col-12">
          <label class="form-label fw-semibold">Event Description & Program</label>
          <textarea name="description" class="form-control rich-editor" rows="6">{{ old('description', $event->description) }}</textarea>
        </div>

        <div class="col-12">
          <div class="form-check form-switch mt-2">
            <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $event->is_featured) ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="is_featured">Highlight as Featured Event on Homepage</label>
          </div>
        </div>

        <div class="col-12 pt-3 border-top d-flex gap-2">
          <button type="submit" class="btn btn-warning text-dark px-4 fw-semibold">
            <i class="fas fa-save me-1"></i> Update Event
          </button>
          <a href="{{ route('admin.events.index') }}" class="btn btn-outline-secondary">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
