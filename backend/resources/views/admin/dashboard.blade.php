@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="page-header">
    <h2>Dashboard</h2>
    <span class="text-muted" style="font-size:14px;">Welcome back, {{ Auth::user()->name ?? 'Admin' }}!</span>
</div>

<div class="row g-4 mb-4">
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="stat-card">
            <div class="stat-icon" style="background:rgba(29,170,216,0.12);color:#1DAAD8;">
                <i class="fas fa-cogs"></i>
            </div>
            <h3>{{ $totalServices ?? 0 }}</h3>
            <p>Total Services</p>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="stat-card">
            <div class="stat-icon" style="background:rgba(237,143,40,0.12);color:#ED8F28;">
                <i class="fas fa-folder-open"></i>
            </div>
            <h3>{{ $totalProjects ?? 0 }}</h3>
            <p>Total Projects</p>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="stat-card">
            <div class="stat-icon" style="background:rgba(29,170,216,0.12);color:#1DAAD8;">
                <i class="fas fa-quote-left"></i>
            </div>
            <h3>{{ $totalTestimonials ?? 0 }}</h3>
            <p>Total Testimonials</p>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="stat-card">
            <div class="stat-icon" style="background:rgba(237,143,40,0.12);color:#ED8F28;">
                <i class="fas fa-users"></i>
            </div>
            <h3>{{ $totalTeam ?? 0 }}</h3>
            <p>Team Members</p>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="stat-card">
            <div class="stat-icon" style="background:rgba(29,170,216,0.12);color:#1DAAD8;">
                <i class="fas fa-microchip"></i>
            </div>
            <h3>{{ $totalTechnologies ?? 0 }}</h3>
            <p>Technologies</p>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="stat-card">
            <div class="stat-icon" style="background:rgba(237,143,40,0.12);color:#ED8F28;">
                <i class="fas fa-envelope"></i>
            </div>
            <h3>{{ $pendingMessages ?? 0 }}</h3>
            <p>Pending Messages</p>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-12">
        <div class="page-header">
            <h2 style="font-size:18px;">Quick Actions</h2>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <a href="{{ route('admin.services.create') }}" class="quick-action">
            <i class="fas fa-plus-circle" style="color:#1DAAD8;"></i>
            Add New Service
        </a>
    </div>
    <div class="col-xl-3 col-md-6">
        <a href="{{ route('admin.projects.create') }}" class="quick-action">
            <i class="fas fa-plus-circle" style="color:#ED8F28;"></i>
            Add New Project
        </a>
    </div>
    <div class="col-xl-3 col-md-6">
        <a href="{{ route('admin.testimonials.create') }}" class="quick-action">
            <i class="fas fa-plus-circle" style="color:#1DAAD8;"></i>
            Add Testimonial
        </a>
    </div>
    <div class="col-xl-3 col-md-6">
        <a href="{{ route('admin.contact-messages.index') }}" class="quick-action">
            <i class="fas fa-envelope" style="color:#ED8F28;"></i>
            View Messages
        </a>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-12">
        <div class="admin-table">
            <div class="p-3 border-bottom">
                <h5 style="font-size:16px;font-weight:600;margin:0;">Recent Contact Messages</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentMessages ?? [] as $message)
                            <tr>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ Str::limit($message->service ?? $message->message, 30) }}</td>
                                <td>{{ $message->created_at->format('M d, Y') }}</td>
                                <td>
                                    @if($message->status == 'read')
                                        <span class="badge bg-success">Read</span>
                                    @elseif($message->status == 'replied')
                                        <span class="badge bg-info">Replied</span>
                                    @else
                                        <span class="badge bg-warning">New</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">No messages yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
