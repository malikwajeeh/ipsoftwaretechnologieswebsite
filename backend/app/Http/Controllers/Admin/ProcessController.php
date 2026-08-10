<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Process;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function index()
    {
        $processes = Process::orderBy('order_number', 'asc')->paginate(15);
        return view('admin.processes.index', compact('processes'));
    }

    public function create()
    {
        return view('admin.processes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'step_number' => 'nullable|integer',
            'is_active' => 'boolean',
            'order_number' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        Process::create($validated);

        return redirect()->route('admin.processes.index')
            ->with('success', 'Process created successfully.');
    }

    public function show(Process $process)
    {
        return view('admin.processes.show', compact('process'));
    }

    public function edit(Process $process)
    {
        return view('admin.processes.edit', compact('process'));
    }

    public function update(Request $request, Process $process)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'step_number' => 'nullable|integer',
            'is_active' => 'boolean',
            'order_number' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $process->update($validated);

        return redirect()->route('admin.processes.index')
            ->with('success', 'Process updated successfully.');
    }

    public function destroy(Process $process)
    {
        $process->delete();

        return redirect()->route('admin.processes.index')
            ->with('success', 'Process deleted successfully.');
    }
}
