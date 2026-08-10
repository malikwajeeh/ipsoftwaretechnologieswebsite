<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;

class HeroSectionController extends Controller
{
    public function index()
    {
        $heroSections = HeroSection::orderBy('order_number', 'asc')->paginate(15);
        return view('admin.hero-sections.index', compact('heroSections'));
    }

    public function create()
    {
        return view('admin.hero-sections.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'badge_text' => 'nullable|string|max:255',
            'video_url' => 'nullable|url|max:255',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'secondary_button_text' => 'nullable|string|max:255',
            'secondary_button_link' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'order_number' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        HeroSection::create($validated);

        return redirect()->route('admin.hero-sections.index')
            ->with('success', 'Hero section created successfully.');
    }

    public function show(HeroSection $heroSection)
    {
        return view('admin.hero-sections.show', compact('heroSection'));
    }

    public function edit(HeroSection $heroSection)
    {
        return view('admin.hero-sections.edit', compact('heroSection'));
    }

    public function update(Request $request, HeroSection $heroSection)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'badge_text' => 'nullable|string|max:255',
            'video_url' => 'nullable|url|max:255',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'secondary_button_text' => 'nullable|string|max:255',
            'secondary_button_link' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'order_number' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $heroSection->update($validated);

        return redirect()->route('admin.hero-sections.index')
            ->with('success', 'Hero section updated successfully.');
    }

    public function destroy(HeroSection $heroSection)
    {
        $heroSection->delete();

        return redirect()->route('admin.hero-sections.index')
            ->with('success', 'Hero section deleted successfully.');
    }
}
