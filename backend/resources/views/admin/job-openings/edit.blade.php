@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Edit Job Opening</h1>
    <a href="{{ route('admin.job-openings.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.job-openings.update', $jobOpening) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="title" class="form-label">Title *</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $jobOpening->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="department" class="form-label">Department *</label>
                    <input type="text" class="form-control @error('department') is-invalid @enderror" id="department" name="department" value="{{ old('department', $jobOpening->department) }}" required>
                    @error('department')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="type" class="form-label">Type *</label>
                    <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
                        <option value="">Select Type</option>
                        <option value="full-time" {{ old('type', $jobOpening->type) == 'full-time' ? 'selected' : '' }}>Full-time</option>
                        <option value="part-time" {{ old('type', $jobOpening->type) == 'part-time' ? 'selected' : '' }}>Part-time</option>
                        <option value="contract" {{ old('type', $jobOpening->type) == 'contract' ? 'selected' : '' }}>Contract</option>
                    </select>
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="location" class="form-label">Location *</label>
                    <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location', $jobOpening->location) }}" required>
                    @error('location')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="salary_range" class="form-label">Salary Range</label>
                    <input type="text" class="form-control @error('salary_range') is-invalid @enderror" id="salary_range" name="salary_range" value="{{ old('salary_range', $jobOpening->salary_range) }}" placeholder="e.g., $50,000 - $70,000">
                    @error('salary_range')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description *</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="6" required>{{ old('description', $jobOpening->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="requirements" class="form-label">Requirements (JSON)</label>
                <textarea class="form-control @error('requirements') is-invalid @enderror" id="requirements" name="requirements" rows="4" placeholder='["Bachelor degree in CS", "3+ years experience", "Knowledge of Laravel"]'>{{ old('requirements', is_array($jobOpening->requirements) ? json_encode($jobOpening->requirements, JSON_PRETTY_PRINT) : $jobOpening->requirements) }}</textarea>
                @error('requirements')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">Enter valid JSON array of requirements.</div>
            </div>

            <div class="mb-3">
                <label for="is_active" class="form-label">Active</label>
                <select class="form-select @error('is_active') is-invalid @enderror" id="is_active" name="is_active">
                    <option value="1" {{ old('is_active', $jobOpening->is_active) == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old('is_active', $jobOpening->is_active) == 0 ? 'selected' : '' }}>No</option>
                </select>
                @error('is_active')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Update Job Opening</button>
                <a href="{{ route('admin.job-openings.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    document.querySelector('textarea[name="requirements"]').addEventListener('blur', function() {
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
</script>
@endpush
@endsection