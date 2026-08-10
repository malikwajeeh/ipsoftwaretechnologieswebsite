<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutSectionController extends Controller
{
    public function index()
    {
        $aboutSections = AboutSection::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.about-sections.index', compact('aboutSections'));
    }

    public function create()
    {
        return view('admin.about-sections.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'mission' => 'nullable|string',
            'vision' => 'nullable|string',
            'values' => 'nullable|array',
            'values.*' => 'string',
            'experience_years' => 'nullable|integer',
            'features' => 'nullable|array',
            'features.*' => 'string',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['values'] = $request->input('values') ?? [];
        $validated['features'] = $request->input('features') ?? [];

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('about-sections', 'public');
        }

        AboutSection::create($validated);

        return redirect()->route('admin.about-sections.index')
            ->with('success', 'About section created successfully.');
    }

    public function show(AboutSection $aboutSection)
    {
        return view('admin.about-sections.show', compact('aboutSection'));
    }

    public function edit(AboutSection $aboutSection)
    {
        return view('admin.about-sections.edit', compact('aboutSection'));
    }

    public function update(Request $request, AboutSection $aboutSection)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'mission' => 'nullable|string',
            'vision' => 'nullable|string',
            'values' => 'nullable|array',
            'values.*' => 'string',
            'experience_years' => 'nullable|integer',
            'features' => 'nullable|array',
            'features.*' => 'string',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['values'] = $request->input('values') ?? [];
        $validated['features'] = $request->input('features') ?? [];

        if ($request->hasFile('image')) {
            if ($aboutSection->image) {
                Storage::disk('public')->delete($aboutSection->image);
            }
            $validated['image'] = $request->file('image')->store('about-sections', 'public');
        }

        $aboutSection->update($validated);

        return redirect()->route('admin.about-sections.index')
            ->with('success', 'About section updated successfully.');
    }

    public function destroy(AboutSection $aboutSection)
    {
        if ($aboutSection->image) {
            Storage::disk('public')->delete($aboutSection->image);
        }

        $aboutSection->delete();

        return redirect()->route('admin.about-sections.index')
            ->with('success', 'About section deleted successfully.');
    }
}
