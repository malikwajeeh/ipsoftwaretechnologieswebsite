@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">SEO Settings</h1>
    <a href="{{ route('admin.seo-settings.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Add SEO Setting
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
                        <th>Page</th>
                        <th>Title</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($seoSettings as $seo)
                        <tr>
                            <td><span class="badge bg-primary">{{ $seo->page }}</span></td>
                            <td>{{ Str::limit($seo->title, 60) }}</td>
                            <td>
                                @if($seo->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.seo-settings.edit', $seo) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.seo-settings.destroy', $seo) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
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
                            <td colspan="4" class="text-center text-muted">No SEO settings found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $seoSettings->links() }}
    </div>
</div>
@endsection