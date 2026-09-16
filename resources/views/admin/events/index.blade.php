@extends('layouts.admin')

@section('title', 'Manage Events')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <h3 class="fw-bold mb-1">Diocesan Events & Assemblies</h3>
    <p class="text-muted mb-0">Organize synods, youth conferences, Mothers' Union conventions, and parish gatherings.</p>
  </div>
  <a href="{{ route('admin.events.create') }}" class="btn btn-warning text-dark">
    <i class="fas fa-plus me-1"></i> Create New Event
  </a>
</div>

<div class="card">
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th style="width: 80px;">Banner</th>
            <th>Event Title & Location</th>
            <th>Date & Time</th>
            <th>Contact</th>
            <th>Featured</th>
            <th class="text-end" style="width: 140px;">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($events as $event)
            <tr>
              <td>
                @if($event->image)
                  <img src="{{ asset('storage/' . $event->image) }}" alt="Event banner" class="rounded" style="width: 55px; height: 55px; object-fit: cover;">
                @else
                  <div class="rounded bg-light d-flex align-items-center justify-content-center text-muted border" style="width: 55px; height: 55px;">
                    <i class="fas fa-calendar-alt"></i>
                  </div>
                @endif
              </td>
              <td>
                <div class="fw-bold text-dark">{{ $event->title }}</div>
                <div class="small text-muted"><i class="fas fa-map-marker-alt text-danger me-1"></i> {{ $event->location }}</div>
              </td>
              <td class="small">
                <strong>{{ $event->start_date ? $event->start_date->format('M d, Y') : '' }}</strong>
                @if($event->end_date && $event->end_date != $event->start_date)
                  <span class="text-muted"> - {{ $event->end_date->format('M d, Y') }}</span>
                @endif
              </td>
              <td class="small text-muted">{{ $event->contact_person ?: 'Diocese Office' }}</td>
              <td>
                @if($event->is_featured)
                  <span class="badge bg-warning text-dark"><i class="fas fa-star me-1"></i> Featured</span>
                @else
                  <span class="badge bg-light text-muted border">Standard</span>
                @endif
              </td>
              <td class="text-end">
                <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                  <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this event?');">
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
                <i class="fas fa-calendar-alt fa-3x mb-3 d-block text-black-50"></i>
                No events scheduled yet. Click "Create New Event" to schedule an upcoming gathering.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
  @if($events->hasPages())
    <div class="card-footer bg-white">
      {{ $events->links() }}
    </div>
  @endif
</div>
@endsection
