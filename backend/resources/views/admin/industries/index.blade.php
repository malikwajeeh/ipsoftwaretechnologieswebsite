@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Industries</h1>
    <a href="{{ route('admin.industries.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Add Industry
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
                        <th>Name</th>
                        <th>Icon</th>
                        <th>Active</th>
                        <th>Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($industries as $industry)
                        <tr>
                            <td>{{ $industry->name }}</td>
                            <td><i class="{{ $industry->icon }}"></i></td>
                            <td>
                                @if($industry->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>{{ $industry->order_number }}</td>
                            <td>
                                <a href="{{ route('admin.industries.edit', $industry) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.industries.destroy', $industry) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
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
                            <td colspan="5" class="text-center text-muted">No industries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $industries->links() }}
    </div>
</div>
@endsection