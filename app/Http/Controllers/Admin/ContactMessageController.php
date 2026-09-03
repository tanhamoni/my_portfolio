<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    // All Messages
    public function index()
    {
        $messages = ContactMessage::latest()->get();

        return view('admin.messages.index', compact('messages'));
    }

    // View Single Message
    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);

        return view('admin.messages.show', compact('message'));
    }

    // Delete Message
    public function delete($id)
    {
        $message = ContactMessage::findOrFail($id);

        $message->delete();

        return redirect()->route('messages.index')
            ->with('success', 'Message deleted successfully.');
    }
}