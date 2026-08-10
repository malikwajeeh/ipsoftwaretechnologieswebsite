@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Edit Why Choose Us</h1>
    <a href="{{ route('admin.why-choose-us.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.why-choose-us.update', $whyChooseUs) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title *</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $whyChooseUs->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', $whyChooseUs->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="icon" class="form-label">Icon</label>
                    <input type="text" class="form-control @error('icon') is-invalid @enderror" id="icon" name="icon" value="{{ old('icon', $whyChooseUs->icon) }}" placeholder="e.g., bi bi-check-circle">
                    @error('icon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="number" class="form-label">Number</label>
                    <input type="number" class="form-control @error('number') is-invalid @enderror" id="number" name="number" value="{{ old('number', $whyChooseUs->number) }}">
                    @error('number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="is_active" class="form-label">Active</label>
                    <select class="form-select @error('is_active') is-invalid @enderror" id="is_active" name="is_active">
                        <option value="1" {{ old('is_active', $whyChooseUs->is_active) == 1 ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ old('is_active', $whyChooseUs->is_active) == 0 ? 'selected' : '' }}>No</option>
                    </select>
                    @error('is_active')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="order_number" class="form-label">Order Number</label>
                    <input type="number" class="form-control @error('order_number') is-invalid @enderror" id="order_number" name="order_number" value="{{ old('order_number', $whyChooseUs->order_number) }}">
                    @error('order_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Update Reason</button>
                <a href="{{ route('admin.why-choose-us.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection