@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Team Members</h1>
    <a href="{{ route('admin.team-members.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Add Team Member
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
                        <th>Role</th>
                        <th>Email</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teamMembers as $member)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($member->avatar)
                                        <img src="{{ asset('storage/' . $member->avatar) }}" alt="{{ $member->name }}" class="rounded-circle me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                    @endif
                                    {{ $member->name }}
                                </div>
                            </td>
                            <td>{{ $member->role }}</td>
                            <td>{{ $member->email }}</td>
                            <td>
                                @if($member->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.team-members.edit', $member) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.team-members.destroy', $member) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
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
                            <td colspan="5" class="text-center text-muted">No team members found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $teamMembers->links() }}
    </div>
</div>
@endsection