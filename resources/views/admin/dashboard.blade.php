@extends('layouts.admin')

@section('title', 'Dashboard Overview')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <h3 class="fw-bold mb-1">Welcome to the Administration Portal</h3>
    <p class="text-muted mb-0">Manage news postings, sermons, events, and parishioner inquiries for the Diocese of Jalle.</p>
  </div>
  <div class="d-flex gap-2">
    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus me-1"></i> New Post</a>
    <a href="{{ route('admin.sermons.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus me-1"></i> New Sermon</a>
    <a href="{{ route('admin.events.create') }}" class="btn btn-warning btn-sm text-dark"><i class="fas fa-plus me-1"></i> New Event</a>
  </div>
</div>

<!-- Stats Row -->
<div class="row g-3 mb-4">
  <div class="col-xl-3 col-md-6">
    <div class="stat-card bg-blue">
      <div>
        <p>NEWS & ARTICLES</p>
        <h3>{{ $postsCount }}</h3>
      </div>
      <i class="fas fa-newspaper stat-icon"></i>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="stat-card bg-green">
      <div>
        <p>SERMONS & MESSAGES</p>
        <h3>{{ $sermonsCount }}</h3>
      </div>
      <i class="fas fa-bible stat-icon"></i>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="stat-card bg-orange">
      <div>
        <p>UPCOMING EVENTS</p>
        <h3>{{ $eventsCount }}</h3>
      </div>
      <i class="fas fa-calendar-alt stat-icon"></i>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="stat-card bg-purple">
      <div>
        <p>UNREAD INQUIRIES</p>
        <h3>{{ $unreadMessagesCount }}</h3>
      </div>
      <i class="fas fa-envelope-open-text stat-icon"></i>
    </div>
  </div>
</div>

<div class="row g-4">
  <!-- Recent Posts -->
  <div class="col-lg-7">
    <div class="card h-100">
      <div class="card-header">
        <span><i class="fas fa-newspaper me-2 text-primary"></i> Recent News & Postings</span>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-outline-secondary">View All</a>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
              <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Date</th>
                <th class="text-end">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse($recentPosts as $post)
                <tr>
                  <td>
                    <div class="fw-semibold text-truncate" style="max-width: 240px;">{{ $post->title }}</div>
                  </td>
                  <td><span class="badge bg-light text-dark border">{{ $post->category }}</span></td>
                  <td>
                    @if($post->is_published)
                      <span class="badge bg-success">Published</span>
                    @else
                      <span class="badge bg-secondary">Draft</span>
                    @endif
                  </td>
                  <td class="text-muted small">{{ $post->created_at->format('M d, Y') }}</td>
                  <td class="text-end">
                    <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></a>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" class="text-center py-4 text-muted">No news posts yet.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Recent Messages / Prayer Requests -->
  <div class="col-lg-5">
    <div class="card h-100">
      <div class="card-header">
        <span><i class="fas fa-envelope me-2 text-info"></i> Recent Inquiries & Prayers</span>
        <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-outline-secondary">View All</a>
      </div>
      <div class="card-body p-0">
        <ul class="list-group list-group-flush">
          @forelse($recentMessages as $msg)
            <li class="list-group-item p-3 {{ !$msg->is_read ? 'bg-light' : '' }}">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <strong class="text-dark small">{{ $msg->name }}</strong>
                <span class="text-muted small">{{ $msg->created_at->diffForHumans() }}</span>
              </div>
              <div class="small fw-semibold text-primary mb-1">{{ $msg->subject ?? 'Prayer Request / Inquiry' }}</div>
              <p class="text-muted small mb-2 text-truncate">{{ $msg->message }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="badge {{ $msg->is_read ? 'bg-secondary' : 'bg-danger' }}">
                  {{ $msg->is_read ? 'Read' : 'New' }}
                </span>
                <a href="{{ route('admin.messages.show', $msg) }}" class="btn btn-sm btn-outline-primary py-0 px-2" style="font-size: 12px;">View Message</a>
              </div>
            </li>
          @empty
            <li class="list-group-item text-center py-4 text-muted">
              No recent inquiries.
            </li>
          @endforelse
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection
