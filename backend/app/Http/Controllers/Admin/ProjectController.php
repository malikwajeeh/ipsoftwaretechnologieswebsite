<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('category')->orderBy('order_number', 'asc')->paginate(15);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = ProjectCategory::orderBy('name', 'asc')->get();
        return view('admin.projects.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string|max:500',
            'image' => 'nullable|image|max:2048',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|max:2048',
            'category_id' => 'required|exists:project_categories,id',
            'technologies' => 'nullable|array',
            'technologies.*' => 'string',
            'client_name' => 'nullable|string|max:255',
            'project_url' => 'nullable|url|max:255',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order_number' => 'nullable|integer',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->boolean('is_active');
        $validated['technologies'] = $request->input('technologies') ?? [];

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        if ($request->hasFile('gallery')) {
            $galleryPaths = [];
            foreach ($request->file('gallery') as $file) {
                $galleryPaths[] = $file->store('projects/gallery', 'public');
            }
            $validated['gallery'] = $galleryPaths;
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        $project->load('category');
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $categories = ProjectCategory::orderBy('name', 'asc')->get();
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string|max:500',
            'image' => 'nullable|image|max:2048',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|max:2048',
            'category_id' => 'required|exists:project_categories,id',
            'technologies' => 'nullable|array',
            'technologies.*' => 'string',
            'client_name' => 'nullable|string|max:255',
            'project_url' => 'nullable|url|max:255',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order_number' => 'nullable|integer',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->boolean('is_active');
        $validated['technologies'] = $request->input('technologies') ?? [];

        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        if ($request->hasFile('gallery')) {
            if ($project->gallery) {
                foreach ($project->gallery as $galleryImage) {
                    Storage::disk('public')->delete($galleryImage);
                }
            }
            $galleryPaths = [];
            foreach ($request->file('gallery') as $file) {
                $galleryPaths[] = $file->store('projects/gallery', 'public');
            }
            $validated['gallery'] = $galleryPaths;
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        if ($project->gallery) {
            foreach ($project->gallery as $galleryImage) {
                Storage::disk('public')->delete($galleryImage);
            }
        }

        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }
}
