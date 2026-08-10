<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectCategoryController extends Controller
{
    public function index()
    {
        $projectCategories = ProjectCategory::orderBy('order_number', 'asc')->paginate(15);
        return view('admin.project-categories.index', compact('projectCategories'));
    }

    public function create()
    {
        return view('admin.project-categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'order_number' => 'nullable|integer',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->boolean('is_active');

        ProjectCategory::create($validated);

        return redirect()->route('admin.project-categories.index')
            ->with('success', 'Project category created successfully.');
    }

    public function show(ProjectCategory $projectCategory)
    {
        $projectCategory->load('projects');
        return view('admin.project-categories.show', compact('projectCategory'));
    }

    public function edit(ProjectCategory $projectCategory)
    {
        return view('admin.project-categories.edit', compact('projectCategory'));
    }

    public function update(Request $request, ProjectCategory $projectCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'order_number' => 'nullable|integer',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->boolean('is_active');

        $projectCategory->update($validated);

        return redirect()->route('admin.project-categories.index')
            ->with('success', 'Project category updated successfully.');
    }

    public function destroy(ProjectCategory $projectCategory)
    {
        $projectCategory->delete();

        return redirect()->route('admin.project-categories.index')
            ->with('success', 'Project category deleted successfully.');
    }
}
