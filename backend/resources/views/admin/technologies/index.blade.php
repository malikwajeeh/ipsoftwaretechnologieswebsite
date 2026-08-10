@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Technologies</h1>
        <a href="{{ route('admin.technologies.create') }}" class="btn btn-primary">Add Technology</a>
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
                            <th>Name</th>
                            <th>Category</th>
                            <th>Proficiency</th>
                            <th>Active</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($technologies as $technology)
                            <tr>
                                <td>{{ $technology->name }}</td>
                                <td>{{ $technology->category }}</td>
                                <td>
                                    <div class="progress" style="height: 20px; min-width: 100px;">
                                        <div class="progress-bar" role="progressbar" style="width: {{ $technology->proficiency }}%;" aria-valuenow="{{ $technology->proficiency }}" aria-valuemin="0" aria-valuemax="100">{{ $technology->proficiency }}%</div>
                                    </div>
                                </td>
                                <td>
                                    @if($technology->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.technologies.edit', $technology->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.technologies.destroy', $technology->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this technology?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No technologies found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $technologies->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
