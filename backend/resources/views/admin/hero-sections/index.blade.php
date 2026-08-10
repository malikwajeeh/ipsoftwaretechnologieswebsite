@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Hero Sections</h1>
        <a href="{{ route('admin.hero-sections.create') }}" class="btn btn-primary">Add Hero Section</a>
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
                            <th>Badge</th>
                            <th>Active</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($heroSections as $heroSection)
                            <tr>
                                <td>{{ $heroSection->title }}</td>
                                <td>{{ $heroSection->badge_text }}</td>
                                <td>
                                    @if($heroSection->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>{{ $heroSection->order_number }}</td>
                                <td>
                                    <a href="{{ route('admin.hero-sections.edit', $heroSection->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.hero-sections.destroy', $heroSection->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this hero section?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No hero sections found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $heroSections->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
