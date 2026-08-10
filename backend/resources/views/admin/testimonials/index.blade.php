@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Testimonials</h1>
    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Add Testimonial
    </a>
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
                        <th>Client</th>
                        <th>Company</th>
                        <th>Rating</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $testimonial)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($testimonial->client_avatar)
                                        <img src="{{ asset('storage/' . $testimonial->client_avatar) }}" alt="{{ $testimonial->client_name }}" class="rounded-circle me-2" style="width: 32px; height: 32px; object-fit: cover;">
                                    @endif
                                    <div>
                                        <strong>{{ $testimonial->client_name }}</strong>
                                        <small class="text-muted d-block">{{ $testimonial->client_role }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $testimonial->client_company }}</td>
                            <td>
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="bi bi-star{{ $i <= $testimonial->rating ? '-fill' : '' }} text-warning"></i>
                                @endfor
                            </td>
                            <td>
                                @if($testimonial->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
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
                            <td colspan="5" class="text-center text-muted">No testimonials found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $testimonials->links() }}
    </div>
</div>
@endsection