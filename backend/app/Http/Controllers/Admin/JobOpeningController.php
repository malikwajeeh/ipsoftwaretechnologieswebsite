<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobOpening;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobOpeningController extends Controller
{
    public function index()
    {
        $jobOpenings = JobOpening::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.job-openings.index', compact('jobOpenings'));
    }

    public function create()
    {
        return view('admin.job-openings.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'type' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'requirements' => 'nullable|array',
            'requirements.*' => 'string',
            'salary_range' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_active'] = $request->boolean('is_active');
        $validated['requirements'] = $request->input('requirements') ?? [];

        JobOpening::create($validated);

        return redirect()->route('admin.job-openings.index')
            ->with('success', 'Job opening created successfully.');
    }

    public function show(JobOpening $jobOpening)
    {
        return view('admin.job-openings.show', compact('jobOpening'));
    }

    public function edit(JobOpening $jobOpening)
    {
        return view('admin.job-openings.edit', compact('jobOpening'));
    }

    public function update(Request $request, JobOpening $jobOpening)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'type' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'requirements' => 'nullable|array',
            'requirements.*' => 'string',
            'salary_range' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['requirements'] = $request->input('requirements') ?? [];

        $jobOpening->update($validated);

        return redirect()->route('admin.job-openings.index')
            ->with('success', 'Job opening updated successfully.');
    }

    public function destroy(JobOpening $jobOpening)
    {
        $jobOpening->delete();

        return redirect()->route('admin.job-openings.index')
            ->with('success', 'Job opening deleted successfully.');
    }
}
