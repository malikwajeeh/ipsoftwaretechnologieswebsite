@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Settings</h1>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<form action="{{ route('admin.settings.update') }}" method="POST">
    @csrf
    @method('PUT')

    @php
        $groupedSettings = $settings->groupBy('group_name');
    @endphp

    @foreach($groupedSettings as $groupName => $groupSettings)
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">{{ ucfirst($groupName ?? 'General') }}</h5>
            </div>
            <div class="card-body">
                @foreach($groupSettings as $setting)
                    <div class="mb-3">
                        <label for="setting_{{ $setting->id }}" class="form-label">
                            {{ ucfirst(str_replace('_', ' ', $setting->key)) }}
                        </label>

                        @if(strlen($setting->value ?? '') > 100)
                            <textarea
                                class="form-control @error('settings.' . $setting->id) is-invalid @enderror"
                                id="setting_{{ $setting->id }}"
                                name="settings[{{ $setting->id }}]"
                                rows="4"
                            >{{ old('settings.' . $setting->id, $setting->value) }}</textarea>
                        @else
                            <input
                                type="text"
                                class="form-control @error('settings.' . $setting->id) is-invalid @enderror"
                                id="setting_{{ $setting->id }}"
                                name="settings[{{ $setting->id }}]"
                                value="{{ old('settings.' . $setting->id, $setting->value) }}"
                            >
                        @endif

                        @error('settings.' . $setting->id)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        @if($setting->description)
                            <div class="form-text">{{ $setting->description }}</div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach

    @if($settings->isEmpty())
        <div class="card">
            <div class="card-body text-center text-muted">
                No settings found. Add settings to the database first.
            </div>
        </div>
    @endif

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Save All Settings
        </button>
    </div>
</form>
@endsection