<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $contactMessages = ContactMessage::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.contact-messages.index', compact('contactMessages'));
    }

    public function show(ContactMessage $contactMessage)
    {
        return view('admin.contact-messages.show', compact('contactMessage'));
    }

    public function update(Request $request, ContactMessage $contactMessage)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:pending,read,replied,archived',
            'admin_reply' => 'nullable|string',
        ]);

        $contactMessage->update($validated);

        return redirect()->route('admin.contact-messages.index')
            ->with('success', 'Contact message updated successfully.');
    }

    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();

        return redirect()->route('admin.contact-messages.index')
            ->with('success', 'Contact message deleted successfully.');
    }
}
