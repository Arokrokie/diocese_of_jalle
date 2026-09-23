@extends('layouts.admin')

@section('title', 'Add New Sermon')

@section('content')
<div class="mb-4">
  <a href="{{ route('admin.sermons.index') }}" class="text-decoration-none text-muted small">
    <i class="fas fa-arrow-left me-1"></i> Back to Sermons
  </a>
  <h3 class="fw-bold mt-2">Add New Sermon</h3>
</div>

<div class="card">
  <div class="card-body p-4">
    <form action="{{ route('admin.sermons.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row g-3">
        <div class="col-md-8">
          <label class="form-label fw-semibold">Sermon Title <span class="text-danger">*</span></label>
          <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="e.g. Walking in Faith and Community Renewal" required>
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Preacher / Minister <span class="text-danger">*</span></label>
          <input type="text" name="preacher" class="form-control" value="{{ old('preacher', 'Rt. Rev. Abraham Matiop Deng Kechdit') }}" required>
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Scripture Reference</label>
          <input type="text" name="scripture" class="form-control" value="{{ old('scripture') }}" placeholder="e.g. Isaiah 40:28-31 / 2 Corinthians 5:17">
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Date Preached <span class="text-danger">*</span></label>
          <input type="date" name="sermon_date" class="form-control" value="{{ old('sermon_date', date('Y-m-d')) }}" required>
        </div>

        <div class="col-md-12">
          <label class="form-label fw-semibold">Thumbnail / Cover Image</label>
          <input type="file" name="image_file" class="form-control" accept="image/*">
          <small class="text-muted">Accepted formats: JPEG, PNG, WebP (Max 5MB). Leave blank to use the default bible image.</small>
        </div>

        <div class="col-12">
          <label class="form-label fw-semibold">Sermon Description</label>
          <textarea name="description" class="form-control" rows="3" placeholder="Brief summary of the theme and key message...">{{ old('description') }}</textarea>
        </div>

        <div class="col-12">
          <label class="form-label fw-semibold">Sermon Transcript / Study Notes</label>
          <textarea name="notes" class="form-control rich-editor" rows="10" placeholder="Detailed outline, scripture study points, or full transcript...">{{ old('notes') }}</textarea>
        </div>

        <div class="col-12 pt-3 border-top d-flex gap-2">
          <button type="submit" class="btn btn-success px-4">
            <i class="fas fa-save me-1"></i> Save Sermon
          </button>
          <a href="{{ route('admin.sermons.index') }}" class="btn btn-outline-secondary">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
