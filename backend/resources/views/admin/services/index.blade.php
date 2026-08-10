@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Services</h1>
        <a href="{{ route('admin.services.create') }}" class="btn btn-primary">Add Service</a>
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
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Icon</th>
                            <th>Active</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($services as $service)
                            <tr>
                                <td>{{ $service->title }}</td>
                                <td>{{ $service->icon }}</td>
                                <td>
                                    @if($service->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>{{ $service->order_number }}</td>
                                <td>
                                    <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this service?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No services found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $services->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
