<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::orderBy('order_number', 'asc')->paginate(15);
        return view('admin.team-members.index', compact('teamMembers'));
    }

    public function create()
    {
        return view('admin.team-members.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'avatar' => 'nullable|image|max:2048',
            'social_links' => 'nullable|array',
            'skills' => 'nullable|array',
            'skills.*' => 'string',
            'is_active' => 'boolean',
            'order_number' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['social_links'] = $request->input('social_links') ?? [];
        $validated['skills'] = $request->input('skills') ?? [];

        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('team-members', 'public');
        }

        TeamMember::create($validated);

        return redirect()->route('admin.team-members.index')
            ->with('success', 'Team member created successfully.');
    }

    public function show(TeamMember $teamMember)
    {
        return view('admin.team-members.show', compact('teamMember'));
    }

    public function edit(TeamMember $teamMember)
    {
        return view('admin.team-members.edit', compact('teamMember'));
    }

    public function update(Request $request, TeamMember $teamMember)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'avatar' => 'nullable|image|max:2048',
            'social_links' => 'nullable|array',
            'skills' => 'nullable|array',
            'skills.*' => 'string',
            'is_active' => 'boolean',
            'order_number' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['social_links'] = $request->input('social_links') ?? [];
        $validated['skills'] = $request->input('skills') ?? [];

        if ($request->hasFile('avatar')) {
            if ($teamMember->avatar) {
                Storage::disk('public')->delete($teamMember->avatar);
            }
            $validated['avatar'] = $request->file('avatar')->store('team-members', 'public');
        }

        $teamMember->update($validated);

        return redirect()->route('admin.team-members.index')
            ->with('success', 'Team member updated successfully.');
    }

    public function destroy(TeamMember $teamMember)
    {
        if ($teamMember->avatar) {
            Storage::disk('public')->delete($teamMember->avatar);
        }

        $teamMember->delete();

        return redirect()->route('admin.team-members.index')
            ->with('success', 'Team member deleted successfully.');
    }
}
