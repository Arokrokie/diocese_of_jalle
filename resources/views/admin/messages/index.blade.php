@extends('layouts.admin')

@section('title', 'Inquiries & Prayer Requests')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <h3 class="fw-bold mb-1">Inquiries & Prayer Requests</h3>
    <p class="text-muted mb-0">Review communications, questions, and intercession requests submitted by parishioners.</p>
  </div>
</div>

<div class="card">
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th style="width: 50px;">Status</th>
            <th>Sender Name</th>
            <th>Email / Phone</th>
            <th>Subject</th>
            <th>Date Received</th>
            <th class="text-end" style="width: 120px;">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse($messages as $msg)
            <tr class="{{ !$msg->is_read ? 'table-light fw-bold' : '' }}">
              <td>
                @if(!$msg->is_read)
                  <span class="badge bg-danger rounded-pill">New</span>
                @else
                  <span class="badge bg-secondary rounded-pill">Read</span>
                @endif
              </td>
              <td>{{ $msg->name }}</td>
              <td class="small">
                <div><a href="mailto:{{ $msg->email }}" class="text-decoration-none">{{ $msg->email }}</a></div>
                @if($msg->phone)
                  <div class="text-muted">{{ $msg->phone }}</div>
                @endif
              </td>
              <td>
                <span class="text-truncate d-inline-block" style="max-width: 250px;">
                  {{ $msg->subject ?: '(No Subject)' }}
                </span>
              </td>
              <td class="small text-muted">{{ $msg->created_at->format('M d, Y h:i A') }}</td>
              <td class="text-end">
                <a href="{{ route('admin.messages.show', $msg) }}" class="btn btn-sm btn-outline-primary" title="View Message">
                  <i class="fas fa-eye"></i>
                </a>
                <form action="{{ route('admin.messages.destroy', $msg) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this message?');">
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
                <i class="fas fa-inbox fa-3x mb-3 d-block text-black-50"></i>
                No messages or prayer requests received yet.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
  @if($messages->hasPages())
    <div class="card-footer bg-white">
      {{ $messages->links() }}
    </div>
  @endif
</div>
@endsection
