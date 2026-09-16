@extends('layouts.admin')

@section('title', 'View Message')

@section('content')
<div class="mb-4">
  <a href="{{ route('admin.messages.index') }}" class="text-decoration-none text-muted small">
    <i class="fas fa-arrow-left me-1"></i> Back to All Messages
  </a>
  <h3 class="fw-bold mt-2">Message Details</h3>
</div>

<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <div>
      <span class="badge bg-secondary me-2">Received: {{ $message->created_at->format('F d, Y 	 h:i A') }}</span>
      <span class="badge bg-success">Status: Read</span>
    </div>
    <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this message?');">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-sm btn-outline-danger">
        <i class="fas fa-trash-alt me-1"></i> Delete Message
      </button>
    </form>
  </div>
  <div class="card-body p-4">
    <div class="row mb-4 pb-3 border-bottom">
      <div class="col-md-6 mb-3 mb-md-0">
        <small class="text-muted text-uppercase fw-semibold d-block">From</small>
        <h5 class="fw-bold mb-1">{{ $message->name }}</h5>
        <div><i class="far fa-envelope text-muted me-1"></i> <a href="mailto:{{ $message->email }}">{{ $message->email }}</a></div>
        @if($message->phone)
          <div><i class="fas fa-phone text-muted me-1"></i> <a href="tel:{{ $message->phone }}">{{ $message->phone }}</a></div>
        @endif
      </div>
      <div class="col-md-6">
        <small class="text-muted text-uppercase fw-semibold d-block">Subject</small>
        <h5 class="text-primary fw-bold">{{ $message->subject ?: 'General Inquiry / Intercession' }}</h5>
      </div>
    </div>

    <div>
      <small class="text-muted text-uppercase fw-semibold d-block mb-2">Message Content</small>
      <div class="p-3 bg-light rounded border text-dark" style="white-space: pre-wrap; font-size: 15px; line-height: 1.7;">{{ $message->message }}</div>
    </div>

    <div class="mt-4 pt-3 border-top d-flex gap-2">
      <a href="mailto:{{ $message->email }}?subject=Re: {{ urlencode($message->subject ?? 'Diocese of Jalle Inquiry') }}" class="btn btn-primary">
        <i class="fas fa-reply me-1"></i> Reply via Email
      </a>
      <a href="{{ route('admin.messages.index') }}" class="btn btn-outline-secondary">Back to Inbox</a>
    </div>
  </div>
</div>
@endsection
