@extends('layouts.admin')

@section('title', 'Manage News & Articles')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <h3 class="fw-bold mb-1">News & Articles</h3>
    <p class="text-muted mb-0">Publish and manage diocesan updates, parish announcements, and press statements.</p>
  </div>
  <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
    <i class="fas fa-plus me-1"></i> Add New Article
  </a>
</div>

<div class="card">
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th style="width: 80px;">Image</th>
            <th>Title & Excerpt</th>
            <th>Category</th>
            <th>Author</th>
            <th>Status</th>
            <th>Date</th>
            <th class="text-end" style="width: 140px;">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($posts as $post)
            <tr>
              <td>
                @if($post->image)
                  <img src="{{ asset('storage/' . $post->image) }}" alt="Post image" class="rounded" style="width: 55px; height: 55px; object-fit: cover;">
                @else
                  <div class="rounded bg-light d-flex align-items-center justify-content-center text-muted border" style="width: 55px; height: 55px;">
                    <i class="fas fa-newspaper"></i>
                  </div>
                @endif
              </td>
              <td>
                <div class="fw-bold text-dark">{{ $post->title }}</div>
                <div class="small text-muted text-truncate" style="max-width: 320px;">{{ $post->excerpt }}</div>
              </td>
              <td><span class="badge bg-secondary">{{ $post->category }}</span></td>
              <td class="small">{{ $post->author }}</td>
              <td>
                @if($post->is_published)
                  <span class="badge bg-success">Published</span>
                @else
                  <span class="badge bg-warning text-dark">Draft</span>
                @endif
              </td>
              <td class="small text-muted">{{ $post->created_at->format('M d, Y') }}</td>
              <td class="text-end">
                <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                  <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this article?');">
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
              <td colspan="7" class="text-center py-5 text-muted">
                <i class="fas fa-newspaper fa-3x mb-3 d-block text-black-50"></i>
                No news articles created yet. Click "Add New Article" to post your first announcement.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
  @if($posts->hasPages())
    <div class="card-footer bg-white">
      {{ $posts->links() }}
    </div>
  @endif
</div>
@endsection
