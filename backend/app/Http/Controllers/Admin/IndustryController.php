<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class IndustryController extends Controller
{
    public function index()
    {
        $industries = Industry::orderBy('order_number', 'asc')->paginate(15);
        return view('admin.industries.index', compact('industries'));
    }

    public function create()
    {
        return view('admin.industries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
            'order_number' => 'nullable|integer',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('industries', 'public');
        }

        Industry::create($validated);

        return redirect()->route('admin.industries.index')
            ->with('success', 'Industry created successfully.');
    }

    public function show(Industry $industry)
    {
        return view('admin.industries.show', compact('industry'));
    }

    public function edit(Industry $industry)
    {
        return view('admin.industries.edit', compact('industry'));
    }

    public function update(Request $request, Industry $industry)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
            'order_number' => 'nullable|integer',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            if ($industry->image) {
                Storage::disk('public')->delete($industry->image);
            }
            $validated['image'] = $request->file('image')->store('industries', 'public');
        }

        $industry->update($validated);

        return redirect()->route('admin.industries.index')
            ->with('success', 'Industry updated successfully.');
    }

    public function destroy(Industry $industry)
    {
        if ($industry->image) {
            Storage::disk('public')->delete($industry->image);
        }

        $industry->delete();

        return redirect()->route('admin.industries.index')
            ->with('success', 'Industry deleted successfully.');
    }
}
