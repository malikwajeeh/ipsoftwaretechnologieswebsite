@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Contact Messages</h1>
    <div>
        <span class="badge bg-primary">{{ $messages->total() }} Total</span>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Service</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $message)
                        <tr>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->service ?? '-' }}</td>
                            <td>
                                @switch($message->status)
                                    @case('pending')
                                        <span class="badge bg-warning">Pending</span>
                                        @break
                                    @case('read')
                                        <span class="badge bg-info">Read</span>
                                        @break
                                    @case('replied')
                                        <span class="badge bg-success">Replied</span>
                                        @break
                                    @case('archived')
                                        <span class="badge bg-secondary">Archived</span>
                                        @break
                                    @default
                                        <span class="badge bg-secondary">{{ $message->status }}</span>
                                @endswitch
                            </td>
                            <td>{{ $message->created_at->format('M d, Y') }}</td>
                            <td>
                                <a href="{{ route('admin.contact-messages.show', $message) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <form action="{{ route('admin.contact-messages.destroy', $message) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this message?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No messages found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $messages->links() }}
    </div>
</div>
@endsection