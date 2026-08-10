@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Edit Hero Section</h1>
        <a href="{{ route('admin.hero-sections.index') }}" class="btn btn-secondary">Back</a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.hero-sections.update', $heroSection->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $heroSection->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="subtitle" class="form-label">Subtitle</label>
                        <input type="text" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle" name="subtitle" value="{{ old('subtitle', $heroSection->subtitle) }}">
                        @error('subtitle')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', $heroSection->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="badge_text" class="form-label">Badge Text</label>
                        <input type="text" class="form-control @error('badge_text') is-invalid @enderror" id="badge_text" name="badge_text" value="{{ old('badge_text', $heroSection->badge_text) }}">
                        @error('badge_text')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="video_url" class="form-label">Video URL</label>
                        <input type="url" class="form-control @error('video_url') is-invalid @enderror" id="video_url" name="video_url" value="{{ old('video_url', $heroSection->video_url) }}">
                        @error('video_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="button_text" class="form-label">Button Text</label>
                        <input type="text" class="form-control @error('button_text') is-invalid @enderror" id="button_text" name="button_text" value="{{ old('button_text', $heroSection->button_text) }}">
                        @error('button_text')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="button_link" class="form-label">Button Link</label>
                        <input type="text" class="form-control @error('button_link') is-invalid @enderror" id="button_link" name="button_link" value="{{ old('button_link', $heroSection->button_link) }}">
                        @error('button_link')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="secondary_button_text" class="form-label">Secondary Button Text</label>
                        <input type="text" class="form-control @error('secondary_button_text') is-invalid @enderror" id="secondary_button_text" name="secondary_button_text" value="{{ old('secondary_button_text', $heroSection->secondary_button_text) }}">
                        @error('secondary_button_text')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="secondary_button_link" class="form-label">Secondary Button Link</label>
                        <input type="text" class="form-control @error('secondary_button_link') is-invalid @enderror" id="secondary_button_link" name="secondary_button_link" value="{{ old('secondary_button_link', $heroSection->secondary_button_link) }}">
                        @error('secondary_button_link')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="order_number" class="form-label">Order Number</label>
                        <input type="number" class="form-control @error('order_number') is-invalid @enderror" id="order_number" name="order_number" value="{{ old('order_number', $heroSection->order_number) }}">
                        @error('order_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="is_active" class="form-label">&nbsp;</label>
                        <div class="form-check mt-2">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" class="form-check-input @error('is_active') is-invalid @enderror" id="is_active" name="is_active" value="1" {{ old('is_active', $heroSection->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Active</label>
                            @error('is_active')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Update Hero Section</button>
                    <a href="{{ route('admin.hero-sections.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
