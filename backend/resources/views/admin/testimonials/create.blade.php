@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Create Testimonial</h1>
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="client_name" class="form-label">Client Name *</label>
                    <input type="text" class="form-control @error('client_name') is-invalid @enderror" id="client_name" name="client_name" value="{{ old('client_name') }}" required>
                    @error('client_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="client_role" class="form-label">Client Role</label>
                    <input type="text" class="form-control @error('client_role') is-invalid @enderror" id="client_role" name="client_role" value="{{ old('client_role') }}">
                    @error('client_role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="client_company" class="form-label">Client Company</label>
                    <input type="text" class="form-control @error('client_company') is-invalid @enderror" id="client_company" name="client_company" value="{{ old('client_company') }}">
                    @error('client_company')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="client_avatar" class="form-label">Client Avatar</label>
                    <input type="file" class="form-control @error('client_avatar') is-invalid @enderror" id="client_avatar" name="client_avatar" accept="image/*">
                    @error('client_avatar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="rating" class="form-label">Rating *</label>
                <select class="form-select @error('rating') is-invalid @enderror" id="rating" name="rating" required>
                    <option value="">Select Rating</option>
                    @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>
                            {{ $i }} {{ $i == 1 ? 'Star' : 'Stars' }}
                        </option>
                    @endfor
                </select>
                @error('rating')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="mt-2" id="ratingPreview">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="bi bi-star{{ $i <= old('rating', 0) ? '-fill' : '' }} text-warning fs-4 rating-star" data-value="{{ $i }}"></i>
                    @endfor
                </div>
            </div>

            <div class="mb-3">
                <label for="testimonial" class="form-label">Testimonial *</label>
                <textarea class="form-control @error('testimonial') is-invalid @enderror" id="testimonial" name="testimonial" rows="4" required>{{ old('testimonial') }}</textarea>
                @error('testimonial')
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
                <button type="submit" class="btn btn-primary">Create Testimonial</button>
                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    document.querySelectorAll('.rating-star').forEach(star => {
        star.addEventListener('click', function() {
            const value = this.dataset.value;
            document.getElementById('rating').value = value;
            updateStars(value);
        });
    });

    document.getElementById('rating').addEventListener('change', function() {
        updateStars(this.value);
    });

    function updateStars(value) {
        document.querySelectorAll('.rating-star').forEach(star => {
            if (parseInt(star.dataset.value) <= parseInt(value)) {
                star.classList.remove('bi-star');
                star.classList.add('bi-star-fill');
            } else {
                star.classList.remove('bi-star-fill');
                star.classList.add('bi-star');
            }
        });
    }
</script>
@endpush
@endsection