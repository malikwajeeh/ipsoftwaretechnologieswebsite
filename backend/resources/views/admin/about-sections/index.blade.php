@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>About Sections</h1>
        <a href="{{ route('admin.about-sections.create') }}" class="btn btn-primary">Add About Section</a>
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
                            <th>Experience Years</th>
                            <th>Active</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($aboutSections as $aboutSection)
                            <tr>
                                <td>{{ $aboutSection->title }}</td>
                                <td>{{ $aboutSection->experience_years }}</td>
                                <td>
                                    @if($aboutSection->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.about-sections.edit', $aboutSection->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.about-sections.destroy', $aboutSection->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this about section?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No about sections found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $aboutSections->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
