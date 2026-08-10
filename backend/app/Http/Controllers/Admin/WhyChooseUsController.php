<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class WhyChooseUsController extends Controller
{
    public function index()
    {
        $whyChooseUs = WhyChooseUs::orderBy('order_number', 'asc')->paginate(15);
        return view('admin.why-choose-us.index', compact('whyChooseUs'));
    }

    public function create()
    {
        return view('admin.why-choose-us.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'number' => 'nullable|integer',
            'is_active' => 'boolean',
            'order_number' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        WhyChooseUs::create($validated);

        return redirect()->route('admin.why-choose-us.index')
            ->with('success', 'Why Choose Us item created successfully.');
    }

    public function show(WhyChooseUs $whyChooseUs)
    {
        return view('admin.why-choose-us.show', compact('whyChooseUs'));
    }

    public function edit(WhyChooseUs $whyChooseUs)
    {
        return view('admin.why-choose-us.edit', compact('whyChooseUs'));
    }

    public function update(Request $request, WhyChooseUs $whyChooseUs)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'number' => 'nullable|integer',
            'is_active' => 'boolean',
            'order_number' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $whyChooseUs->update($validated);

        return redirect()->route('admin.why-choose-us.index')
            ->with('success', 'Why Choose Us item updated successfully.');
    }

    public function destroy(WhyChooseUs $whyChooseUs)
    {
        $whyChooseUs->delete();

        return redirect()->route('admin.why-choose-us.index')
            ->with('success', 'Why Choose Us item deleted successfully.');
    }
}
