@extends('layouts.admin')

@section('title', 'Edit Sermon')

@section('content')
<div class="mb-4">
  <a href="{{ route('admin.sermons.index') }}" class="text-decoration-none text-muted small">
    <i class="fas fa-arrow-left me-1"></i> Back to Sermons
  </a>
  <h3 class="fw-bold mt-2">Edit Sermon: {{ $sermon->title }}</h3>
</div>

<div class="card">
  <div class="card-body p-4">
    <form action="{{ route('admin.sermons.update', $sermon) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row g-3">
        <div class="col-md-8">
          <label class="form-label fw-semibold">Sermon Title <span class="text-danger">*</span></label>
          <input type="text" name="title" class="form-control" value="{{ old('title', $sermon->title) }}" required>
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Preacher / Minister <span class="text-danger">*</span></label>
          <input type="text" name="preacher" class="form-control" value="{{ old('preacher', $sermon->preacher) }}" required>
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Scripture Reference</label>
          <input type="text" name="scripture" class="form-control" value="{{ old('scripture', $sermon->scripture) }}">
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Date Preached <span class="text-danger">*</span></label>
          <input type="date" name="sermon_date" class="form-control" value="{{ old('sermon_date', $sermon->sermon_date ? $sermon->sermon_date->format('Y-m-d') : '') }}" required>
        </div>

        <div class="col-12">
          <label class="form-label fw-semibold">Sermon Description</label>
          <textarea name="description" class="form-control" rows="3">{{ old('description', $sermon->description) }}</textarea>
        </div>

        <div class="col-12">
          <label class="form-label fw-semibold">Sermon Transcript / Study Notes</label>
          <textarea name="notes" class="form-control rich-editor" rows="10">{{ old('notes', $sermon->notes) }}</textarea>
        </div>

        <div class="col-12 pt-3 border-top d-flex gap-2">
          <button type="submit" class="btn btn-success px-4">
            <i class="fas fa-save me-1"></i> Update Sermon
          </button>
          <a href="{{ route('admin.sermons.index') }}" class="btn btn-outline-secondary">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
