@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Message from {{ $contactMessage->name }}</h1>
    <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Message Details</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Name:</strong> {{ $contactMessage->name }}
                    </div>
                    <div class="col-md-6">
                        <strong>Email:</strong> <a href="mailto:{{ $contactMessage->email }}">{{ $contactMessage->email }}</a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Phone:</strong> {{ $contactMessage->phone ?? '-' }}
                    </div>
                    <div class="col-md-6">
                        <strong>Service:</strong> {{ $contactMessage->service ?? '-' }}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Status:</strong>
                        @switch($contactMessage->status)
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
                                <span class="badge bg-secondary">{{ $contactMessage->status }}</span>
                        @endswitch
                    </div>
                    <div class="col-md-6">
                        <strong>Date:</strong> {{ $contactMessage->created_at->format('M d, Y h:i A') }}
                    </div>
                </div>
                <hr>
                <div>
                    <strong>Message:</strong>
                    <div class="mt-2 p-3 bg-light rounded">
                        {!! nl2br(e($contactMessage->message)) !!}
                    </div>
                </div>
            </div>
        </div>

        @if($contactMessage->admin_reply)
            <div class="card mb-4 border-success">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Admin Reply</h5>
                </div>
                <div class="card-body">
                    <div class="p-3 bg-light rounded">
                        {!! nl2br(e($contactMessage->admin_reply)) !!}
                    </div>
                    <small class="text-muted mt-2 d-block">Replied at: {{ $contactMessage->replied_at?->format('M d, Y h:i A') }}</small>
                </div>
            </div>
        @endif
    </div>

    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Reply / Update Status</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.contact-messages.update', $contactMessage) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                            <option value="pending" {{ old('status', $contactMessage->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="read" {{ old('status', $contactMessage->status) == 'read' ? 'selected' : '' }}>Read</option>
                            <option value="replied" {{ old('status', $contactMessage->status) == 'replied' ? 'selected' : '' }}>Replied</option>
                            <option value="archived" {{ old('status', $contactMessage->status) == 'archived' ? 'selected' : '' }}>Archived</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="admin_reply" class="form-label">Admin Reply</label>
                        <textarea class="form-control @error('admin_reply') is-invalid @enderror" id="admin_reply" name="admin_reply" rows="6">{{ old('admin_reply', $contactMessage->admin_reply) }}</textarea>
                        @error('admin_reply')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Update Message</button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.contact-messages.destroy', $contactMessage) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger w-100">
                        <i class="bi bi-trash"></i> Delete Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection