<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::orderBy('order_number', 'asc')->paginate(15);
        return view('admin.technologies.index', compact('technologies'));
    }

    public function create()
    {
        return view('admin.technologies.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:7',
            'category' => 'nullable|string|max:255',
            'proficiency' => 'nullable|integer|min:0|max:100',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'order_number' => 'nullable|integer',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->boolean('is_active');

        Technology::create($validated);

        return redirect()->route('admin.technologies.index')
            ->with('success', 'Technology created successfully.');
    }

    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    public function update(Request $request, Technology $technology)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:7',
            'category' => 'nullable|string|max:255',
            'proficiency' => 'nullable|integer|min:0|max:100',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'order_number' => 'nullable|integer',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->boolean('is_active');

        $technology->update($validated);

        return redirect()->route('admin.technologies.index')
            ->with('success', 'Technology updated successfully.');
    }

    public function destroy(Technology $technology)
    {
        $technology->delete();

        return redirect()->route('admin.technologies.index')
            ->with('success', 'Technology deleted successfully.');
    }
}
