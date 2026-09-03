<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use Illuminate\Http\Request;

class ContactSettingController extends Controller
{
    public function index()
    {
        $contact = ContactSetting::first();

        return view('admin.contact.edit', compact('contact'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'location' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',

            'phone' => 'nullable|string|max:50',
            'phone2' => 'nullable|string|max:50',

            'email' => 'nullable|email|max:255',
            'email2' => 'nullable|email|max:255',

            'contact_description' => 'nullable',
            'form_title' => 'nullable|string|max:255',
            'form_description' => 'nullable',
        ]);

        $contact = ContactSetting::first();

        if (!$contact) {
            $contact = new ContactSetting();
        }

        $contact->location = $request->location;
        $contact->country = $request->country;

        $contact->phone = $request->phone;
        $contact->phone2 = $request->phone2;

        $contact->email = $request->email;
        $contact->email2 = $request->email2;

        $contact->contact_description = $request->contact_description;
        $contact->form_title = $request->form_title;
        $contact->form_description = $request->form_description;

        $contact->save();

        return redirect()->back()->with('success', 'Contact Settings Updated Successfully');
    }
}