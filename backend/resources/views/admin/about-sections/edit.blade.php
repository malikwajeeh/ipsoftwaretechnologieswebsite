@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Edit About Section</h1>
        <a href="{{ route('admin.about-sections.index') }}" class="btn btn-secondary">Back</a>
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
            <form action="{{ route('admin.about-sections.update', $aboutSection->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $aboutSection->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="subtitle" class="form-label">Subtitle</label>
                        <input type="text" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle" name="subtitle" value="{{ old('subtitle', $aboutSection->subtitle) }}">
                        @error('subtitle')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', $aboutSection->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    @if($aboutSection->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $aboutSection->image) }}" alt="Current Image" class="img-thumbnail" style="max-width: 200px;">
                        </div>
                    @endif
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="mission" class="form-label">Mission</label>
                        <textarea class="form-control @error('mission') is-invalid @enderror" id="mission" name="mission" rows="4">{{ old('mission', $aboutSection->mission) }}</textarea>
                        @error('mission')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="vision" class="form-label">Vision</label>
                        <textarea class="form-control @error('vision') is-invalid @enderror" id="vision" name="vision" rows="4">{{ old('vision', $aboutSection->vision) }}</textarea>
                        @error('vision')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="values" class="form-label">Values (JSON Array)</label>
                    <textarea class="form-control @error('values') is-invalid @enderror" id="values" name="values" rows="3">{{ old('values', is_array($aboutSection->values) ? json_encode($aboutSection->values) : $aboutSection->values) }}</textarea>
                    <small class="text-muted">Enter a JSON array, e.g., ["Integrity", "Innovation", "Excellence"]</small>
                    @error('values')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="experience_years" class="form-label">Experience Years</label>
                        <input type="number" class="form-control @error('experience_years') is-invalid @enderror" id="experience_years" name="experience_years" value="{{ old('experience_years', $aboutSection->experience_years) }}">
                        @error('experience_years')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="is_active" class="form-label">&nbsp;</label>
                        <div class="form-check mt-2">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" class="form-check-input @error('is_active') is-invalid @enderror" id="is_active" name="is_active" value="1" {{ old('is_active', $aboutSection->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Active</label>
                            @error('is_active')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="features" class="form-label">Features (JSON Array)</label>
                    <textarea class="form-control @error('features') is-invalid @enderror" id="features" name="features" rows="3">{{ old('features', is_array($aboutSection->features) ? json_encode($aboutSection->features) : $aboutSection->features) }}</textarea>
                    <small class="text-muted">Enter a JSON array, e.g., ["Web Development", "Mobile Apps", "Cloud Solutions"]</small>
                    @error('features')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Update About Section</button>
                    <a href="{{ route('admin.about-sections.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
