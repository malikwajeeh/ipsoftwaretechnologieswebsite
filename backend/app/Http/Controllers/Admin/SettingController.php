<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = WebsiteSetting::orderBy('group_name', 'asc')
            ->orderBy('key_name', 'asc')
            ->get()
            ->groupBy('group_name');

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'settings' => 'required|array',
            'settings.*.key_name' => 'required|string|max:255',
            'settings.*.value' => 'nullable|string',
            'settings.*.group_name' => 'nullable|string|max:255',
        ]);

        foreach ($validated['settings'] as $settingData) {
            WebsiteSetting::set(
                $settingData['key_name'],
                $settingData['value'],
                $settingData['group_name'] ?? 'general'
            );
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'Settings updated successfully.');
    }
}
