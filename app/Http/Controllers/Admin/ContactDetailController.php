<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactMessage;

class ContactDetailController extends Controller
{
    public function edit()
    {
        $contactDetail = ContactDetail::firstOrCreate([]);
        return view('admin.contact_details.edit', compact('contactDetail'));
    }

    public function update(Request $request)
{
    $request->validate([
        'address' => 'nullable|string|max:255',
        'email' => 'required|email|max:255',
        'phone_number' => 'nullable|string|max:20',
        'twitter' => 'nullable|url|max:255',
        'facebook' => 'nullable|url|max:255',
        'linkedin' => 'nullable|url|max:255',
        'instagram' => 'nullable|url|max:255',
    ]);

    $contactDetail = ContactDetail::first();
    $contactDetail->update($request->all());

    return redirect()->route('admin.contact_details.edit')->with('success', 'Contact details updated successfully.');
}

}
