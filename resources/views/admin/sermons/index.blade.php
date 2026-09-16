@extends('layouts.admin')

@section('title', 'Manage Sermons & Word')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <h3 class="fw-bold mb-1">Sermons & Pastoral Messages</h3>
    <p class="text-muted mb-0">Archive audio, video, notes, and transcripts of sermons preached across the diocese.</p>
  </div>
  <a href="{{ route('admin.sermons.create') }}" class="btn btn-success">
    <i class="fas fa-plus me-1"></i> Add New Sermon
  </a>
</div>

<div class="card">
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th style="width: 80px;">Thumbnail</th>
            <th>Sermon Title & Scripture</th>
            <th>Preacher</th>
            <th>Date Preached</th>
            <th>Media</th>
            <th class="text-end" style="width: 140px;">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($sermons as $sermon)
            <tr>
              <td>
                @if($sermon->image)
                  <img src="{{ asset('storage/' . $sermon->image) }}" alt="Sermon thumbnail" class="rounded" style="width: 55px; height: 55px; object-fit: cover;">
                @else
                  <div class="rounded bg-light d-flex align-items-center justify-content-center text-muted border" style="width: 55px; height: 55px;">
                    <i class="fas fa-bible"></i>
                  </div>
                @endif
              </td>
              <td>
                <div class="fw-bold text-dark">{{ $sermon->title }}</div>
                @if($sermon->scripture)
                  <div class="small text-primary"><i class="fas fa-bookmark me-1"></i> {{ $sermon->scripture }}</div>
                @endif
              </td>
              <td class="small fw-semibold">{{ $sermon->preacher }}</td>
              <td class="small text-muted">{{ $sermon->sermon_date ? $sermon->sermon_date->format('M d, Y') : '-' }}</td>
              <td>
                <div class="d-flex gap-1">
                  @if($sermon->audio_url)
                    <span class="badge bg-primary" title="Audio available"><i class="fas fa-headphones"></i></span>
                  @endif
                  @if($sermon->video_url)
                    <span class="badge bg-danger" title="Video available"><i class="fas fa-video"></i></span>
                  @endif
                  @if($sermon->notes)
                    <span class="badge bg-secondary" title="Notes available"><i class="fas fa-file-alt"></i></span>
                  @endif
                </div>
              </td>
              <td class="text-end">
                <a href="{{ route('admin.sermons.edit', $sermon) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                  <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('admin.sermons.destroy', $sermon) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this sermon?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center py-5 text-muted">
                <i class="fas fa-bible fa-3x mb-3 d-block text-black-50"></i>
                No sermons recorded yet. Click "Add New Sermon" to add the first message.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
  @if($sermons->hasPages())
    <div class="card-footer bg-white">
      {{ $sermons->links() }}
    </div>
  @endif
</div>
@endsection
