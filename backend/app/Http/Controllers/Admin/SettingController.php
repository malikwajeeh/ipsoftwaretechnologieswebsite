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
        $settings = $request->input('settings', []);

        foreach ($settings as $data) {
            WebsiteSetting::set(
                $data['key_name'],
                $data['value'] ?? '',
                $data['group_name'] ?? 'general'
            );
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'Settings updated successfully.');
    }
}
