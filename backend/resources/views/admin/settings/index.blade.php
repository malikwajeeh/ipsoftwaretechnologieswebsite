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

    @foreach($settings as $groupName => $groupSettings)
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">{{ ucfirst($groupName ?? 'General') }}</h5>
            </div>
            <div class="card-body">
                @foreach($groupSettings as $setting)
                    <div class="mb-3">
                        <label for="setting_{{ $setting->key_name }}" class="form-label">
                            {{ ucfirst(str_replace('_', ' ', $setting->key_name)) }}
                        </label>

                        @if(strlen($setting->value ?? '') > 100)
                            <textarea
                                class="form-control @error('settings.' . $setting->key_name) is-invalid @enderror"
                                id="setting_{{ $setting->key_name }}"
                                name="settings[{{ $setting->key_name }}][value]"
                                rows="4"
                            >{{ old('settings.' . $setting->key_name . '.value', $setting->value) }}</textarea>
                        @else
                            <input
                                type="text"
                                class="form-control @error('settings.' . $setting->key_name) is-invalid @enderror"
                                id="setting_{{ $setting->key_name }}"
                                name="settings[{{ $setting->key_name }}][value]"
                                value="{{ old('settings.' . $setting->key_name . '.value', $setting->value) }}"
                            >
                        @endif

                        <input type="hidden" name="settings[{{ $setting->key_name }}][key_name]" value="{{ $setting->key_name }}">
                        <input type="hidden" name="settings[{{ $setting->key_name }}][group_name]" value="{{ $setting->group_name }}">

                        @error('settings.' . $setting->key_name)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
            <i class="fas fa-save"></i> Save All Settings
        </button>
    </div>
</form>
@endsection