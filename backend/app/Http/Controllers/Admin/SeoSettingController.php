<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SeoSettingController extends Controller
{
    public function index()
    {
        $seoSettings = SeoSetting::orderBy('page', 'asc')->paginate(15);
        return view('admin.seo-settings.index', compact('seoSettings'));
    }

    public function create()
    {
        return view('admin.seo-settings.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'page' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:500',
            'keywords' => 'nullable|string|max:500',
            'og_image' => 'nullable|image|max:2048',
            'canonical_url' => 'nullable|url|max:255',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('og_image')) {
            $validated['og_image'] = $request->file('og_image')->store('seo-settings', 'public');
        }

        SeoSetting::create($validated);

        return redirect()->route('admin.seo-settings.index')
            ->with('success', 'SEO setting created successfully.');
    }

    public function show(SeoSetting $seoSetting)
    {
        return view('admin.seo-settings.show', compact('seoSetting'));
    }

    public function edit(SeoSetting $seoSetting)
    {
        return view('admin.seo-settings.edit', compact('seoSetting'));
    }

    public function update(Request $request, SeoSetting $seoSetting)
    {
        $validated = $request->validate([
            'page' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:500',
            'keywords' => 'nullable|string|max:500',
            'og_image' => 'nullable|image|max:2048',
            'canonical_url' => 'nullable|url|max:255',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('og_image')) {
            if ($seoSetting->og_image) {
                Storage::disk('public')->delete($seoSetting->og_image);
            }
            $validated['og_image'] = $request->file('og_image')->store('seo-settings', 'public');
        }

        $seoSetting->update($validated);

        return redirect()->route('admin.seo-settings.index')
            ->with('success', 'SEO setting updated successfully.');
    }

    public function destroy(SeoSetting $seoSetting)
    {
        if ($seoSetting->og_image) {
            Storage::disk('public')->delete($seoSetting->og_image);
        }

        $seoSetting->delete();

        return redirect()->route('admin.seo-settings.index')
            ->with('success', 'SEO setting deleted successfully.');
    }
}
