@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Create Team Member</h1>
    <a href="{{ route('admin.team-members.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.team-members.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Name *</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="role" class="form-label">Role *</label>
                    <input type="text" class="form-control @error('role') is-invalid @enderror" id="role" name="role" value="{{ old('role') }}" required>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email *</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="bio" class="form-label">Bio</label>
                <textarea class="form-control @error('bio') is-invalid @enderror" id="bio" name="bio" rows="4">{{ old('bio') }}</textarea>
                @error('bio')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="avatar" class="form-label">Avatar</label>
                <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="avatar" name="avatar" accept="image/*">
                @error('avatar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="social_links" class="form-label">Social Links (JSON)</label>
                <textarea class="form-control @error('social_links') is-invalid @enderror" id="social_links" name="social_links" rows="3" placeholder='{"linkedin": "https://linkedin.com/in/username", "twitter": "https://twitter.com/username"}'>{{ old('social_links') }}</textarea>
                @error('social_links')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">Enter valid JSON object with social media URLs.</div>
            </div>

            <div class="mb-3">
                <label for="skills" class="form-label">Skills (JSON)</label>
                <textarea class="form-control @error('skills') is-invalid @enderror" id="skills" name="skills" rows="3" placeholder='["PHP", "Laravel", "MySQL"]'>{{ old('skills') }}</textarea>
                @error('skills')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">Enter valid JSON array of skills.</div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="is_active" class="form-label">Active</label>
                    <select class="form-select @error('is_active') is-invalid @enderror" id="is_active" name="is_active">
                        <option value="1" {{ old('is_active', 1) == 1 ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ old('is_active', 1) == 0 ? 'selected' : '' }}>No</option>
                    </select>
                    @error('is_active')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="order_number" class="form-label">Order Number</label>
                    <input type="number" class="form-control @error('order_number') is-invalid @enderror" id="order_number" name="order_number" value="{{ old('order_number', 0) }}">
                    @error('order_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Create Team Member</button>
                <a href="{{ route('admin.team-members.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    document.querySelectorAll('textarea[name="social_links"], textarea[name="skills"]').forEach(textarea => {
        textarea.addEventListener('blur', function() {
            if (this.value.trim()) {
                try {
                    JSON.parse(this.value);
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                } catch (e) {
                    this.classList.remove('is-valid');
                    this.classList.add('is-invalid');
                }
            }
        });
    });
</script>
@endpush
@endsection