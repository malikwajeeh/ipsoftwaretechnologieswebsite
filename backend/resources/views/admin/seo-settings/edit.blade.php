@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Edit SEO Setting</h1>
    <a href="{{ route('admin.seo-settings.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.seo-settings.update', $seoSetting) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="page" class="form-label">Page *</label>
                <input type="text" class="form-control @error('page') is-invalid @enderror" id="page" name="page" value="{{ old('page', $seoSetting->page) }}" placeholder="e.g., home, about, services" required>
                @error('page')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">Unique identifier for the page (e.g., home, about, services).</div>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Title *</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $seoSetting->title) }}" maxlength="70" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">Recommended: 50-60 characters. Current: <span id="titleCount">{{ strlen(old('title', $seoSetting->title)) }}</span></div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description *</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" maxlength="160" required>{{ old('description', $seoSetting->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">Recommended: 150-160 characters. Current: <span id="descCount">{{ strlen(old('description', $seoSetting->description)) }}</span></div>
            </div>

            <div class="mb-3">
                <label for="keywords" class="form-label">Keywords</label>
                <textarea class="form-control @error('keywords') is-invalid @enderror" id="keywords" name="keywords" rows="2">{{ old('keywords', $seoSetting->keywords) }}</textarea>
                @error('keywords')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">Comma-separated keywords.</div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="og_image" class="form-label">OG Image</label>
                    @if($seoSetting->og_image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $seoSetting->og_image) }}" alt="Current OG image" class="img-thumbnail" style="max-height: 100px;">
                        </div>
                    @endif
                    <input type="file" class="form-control @error('og_image') is-invalid @enderror" id="og_image" name="og_image" accept="image/*">
                    @error('og_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">Recommended: 1200x630 pixels.</div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="canonical_url" class="form-label">Canonical URL</label>
                    <input type="url" class="form-control @error('canonical_url') is-invalid @enderror" id="canonical_url" name="canonical_url" value="{{ old('canonical_url', $seoSetting->canonical_url) }}">
                    @error('canonical_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="is_active" class="form-label">Active</label>
                <select class="form-select @error('is_active') is-invalid @enderror" id="is_active" name="is_active">
                    <option value="1" {{ old('is_active', $seoSetting->is_active) == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old('is_active', $seoSetting->is_active) == 0 ? 'selected' : '' }}>No</option>
                </select>
                @error('is_active')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Update SEO Setting</button>
                <a href="{{ route('admin.seo-settings.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    const titleInput = document.getElementById('title');
    const descInput = document.getElementById('description');
    const titleCount = document.getElementById('titleCount');
    const descCount = document.getElementById('descCount');

    function updateCounts() {
        titleCount.textContent = titleInput.value.length;
        descCount.textContent = descInput.value.length;
    }

    titleInput.addEventListener('input', updateCounts);
    descInput.addEventListener('input', updateCounts);
</script>
@endpush
@endsection