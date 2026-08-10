@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Processes</h1>
    <a href="{{ route('admin.processes.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Add Process
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
                        <th>Step</th>
                        <th>Title</th>
                        <th>Icon</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($processes as $process)
                        <tr>
                            <td>{{ $process->step_number }}</td>
                            <td>{{ $process->title }}</td>
                            <td><i class="{{ $process->icon }}"></i></td>
                            <td>
                                @if($process->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.processes.edit', $process) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.processes.destroy', $process) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
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
                            <td colspan="5" class="text-center text-muted">No processes found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $processes->links() }}
    </div>
</div>
@endsection