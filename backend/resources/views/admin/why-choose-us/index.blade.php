@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Why Choose Us</h1>
    <a href="{{ route('admin.why-choose-us.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Add Reason
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
                        <th>Number</th>
                        <th>Title</th>
                        <th>Icon</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($whyChooseUs as $item)
                        <tr>
                            <td>{{ $item->number }}</td>
                            <td>{{ $item->title }}</td>
                            <td><i class="{{ $item->icon }}"></i></td>
                            <td>
                                @if($item->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.why-choose-us.edit', $item) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.why-choose-us.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
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
                            <td colspan="5" class="text-center text-muted">No reasons found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $whyChooseUs->links() }}
    </div>
</div>
@endsection