@extends('layouts.admin')

@section('title', 'Schedule New Event')

@section('content')
<div class="mb-4">
  <a href="{{ route('admin.events.index') }}" class="text-decoration-none text-muted small">
    <i class="fas fa-arrow-left me-1"></i> Back to Events
  </a>
  <h3 class="fw-bold mt-2">Schedule New Event</h3>
</div>

<div class="card">
  <div class="card-body p-4">
    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row g-3">
        <div class="col-md-8">
          <label class="form-label fw-semibold">Event Title <span class="text-danger">*</span></label>
          <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="e.g. Annual Diocesan Synod 2026" required>
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Location / Venue <span class="text-danger">*</span></label>
          <input type="text" name="location" class="form-control" value="{{ old('location', 'St. Peter Cathedral, Jalle Payam') }}" required>
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Start Date & Time <span class="text-danger">*</span></label>
          <input type="datetime-local" name="start_date" class="form-control" value="{{ old('start_date') }}" required>
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">End Date & Time</label>
          <input type="datetime-local" name="end_date" class="form-control" value="{{ old('end_date') }}">
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Contact Person / Department</label>
          <input type="text" name="contact_person" class="form-control" value="{{ old('contact_person', 'Diocesan Secretariat') }}">
        </div>

        <div class="col-md-12">
          <label class="form-label fw-semibold">Event Poster / Banner Image</label>
          <input type="file" name="image_file" class="form-control" accept="image/*">
          <small class="text-muted">Accepted formats: JPEG, PNG, WebP (Max 5MB)</small>
        </div>

        <div class="col-12">
          <label class="form-label fw-semibold">Event Description & Program</label>
          <textarea name="description" class="form-control rich-editor" rows="6" placeholder="Details regarding schedule, accommodation, registration, and theme...">{{ old('description') }}</textarea>
        </div>

        <div class="col-12">
          <div class="form-check form-switch mt-2">
            <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="is_featured">Highlight as Featured Event on Homepage</label>
          </div>
        </div>

        <div class="col-12 pt-3 border-top d-flex gap-2">
          <button type="submit" class="btn btn-warning text-dark px-4 fw-semibold">
            <i class="fas fa-save me-1"></i> Save Event
          </button>
          <a href="{{ route('admin.events.index') }}" class="btn btn-outline-secondary">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
