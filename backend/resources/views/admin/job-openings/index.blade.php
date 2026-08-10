@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Job Openings</h1>
    <a href="{{ route('admin.job-openings.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Add Job Opening
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
                        <th>Title</th>
                        <th>Department</th>
                        <th>Type</th>
                        <th>Location</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jobOpenings as $job)
                        <tr>
                            <td>{{ $job->title }}</td>
                            <td>{{ $job->department }}</td>
                            <td>
                                <span class="badge bg-{{ $job->type == 'full-time' ? 'primary' : ($job->type == 'part-time' ? 'info' : 'warning') }}">
                                    {{ ucfirst($job->type) }}
                                </span>
                            </td>
                            <td>{{ $job->location }}</td>
                            <td>
                                @if($job->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.job-openings.edit', $job) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.job-openings.destroy', $job) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
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
                            <td colspan="6" class="text-center text-muted">No job openings found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $jobOpenings->links() }}
    </div>
</div>
@endsection