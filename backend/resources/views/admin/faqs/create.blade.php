@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Create FAQ</h1>
    <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.faqs.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="question" class="form-label">Question *</label>
                <textarea class="form-control @error('question') is-invalid @enderror" id="question" name="question" rows="3" required>{{ old('question') }}</textarea>
                @error('question')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="answer" class="form-label">Answer *</label>
                <textarea class="form-control @error('answer') is-invalid @enderror" id="answer" name="answer" rows="6" required>{{ old('answer') }}</textarea>
                @error('answer')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" value="{{ old('category') }}" placeholder="e.g., General, Technical, Pricing">
                @error('category')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
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
                <button type="submit" class="btn btn-primary">Create FAQ</button>
                <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection