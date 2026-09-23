@extends('layouts.admin')

@section('title', 'Photo Gallery Management')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <h3 class="fw-bold mb-0">Photo Gallery</h3>
    <p class="text-muted small mb-0">Manage diocesan photos displayed on the public gallery page</p>
  </div>
  <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
    <i class="fas fa-plus me-1"></i> Add New Photo
  </a>
</div>

@if(session('success'))
  <div class="alert alert-success alert-dismissible fade show">{{ session('success') }} <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
@endif

<div class="card">
  <div class="card-body p-0">
    @if($photos->count())
    <div class="table-responsive">
      <table class="table table-hover mb-0 align-middle">
        <thead class="table-light">
          <tr>
            <th style="width:80px;">Image</th>
            <th>Title</th>
            <th>Category</th>
            <th>Event Date</th>
            <th>Status</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($photos as $photo)
          <tr>
            <td>
              <img src="{{ asset('storage/' . $photo->image) }}" alt="{{ $photo->title }}"
                   class="rounded border" style="width:60px; height:45px; object-fit:cover;">
            </td>
            <td>
              <strong>{{ $photo->title }}</strong>
              @if($photo->caption)
                <small class="text-muted d-block">{{ Str::limit($photo->caption, 60) }}</small>
              @endif
            </td>
            <td><span class="badge bg-light text-dark border">{{ $photo->category ?: '—' }}</span></td>
            <td class="small text-muted">{{ $photo->event_date ? $photo->event_date->format('M d, Y') : '—' }}</td>
            <td>
              @if($photo->is_published)
                <span class="badge bg-success">Published</span>
              @else
                <span class="badge bg-secondary">Draft</span>
              @endif
            </td>
            <td class="text-end">
              <a href="{{ route('admin.gallery.edit', $photo) }}" class="btn btn-sm btn-outline-primary me-1">
                <i class="fas fa-edit"></i>
              </a>
              <form action="{{ route('admin.gallery.destroy', $photo) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Delete this photo permanently?')">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @if($photos->hasPages())
      <div class="p-3 d-flex justify-content-center">{{ $photos->links() }}</div>
    @endif
    @else
    <div class="text-center py-5">
      <i class="fas fa-images fa-3x text-muted mb-3 d-block"></i>
      <p class="text-muted">No photos uploaded yet. Add your first photo to get started.</p>
      <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">Add First Photo</a>
    </div>
    @endif
  </div>
</div>
@endsection
