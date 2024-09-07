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
        $teamMembers = TeamMember::all(); // Get all team members
        return view('admin.team.index', compact('teamMembers'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048' // Validate the image, if present
        ]);

        $data = $request->only(['name', 'job_title']); // Get 'name' and 'job_title' from the request

        // Handle the file upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image_path'] = $request->image->store('team', 'public');
        }

        TeamMember::create($data);

        return redirect()->route('admin.team.index')->with('success', 'Team member added successfully.');
    }

    public function edit(TeamMember $teamMember)
    {
        return view('admin.team.edit', compact('teamMember'));
    }

    public function update(Request $request, TeamMember $teamMember)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048' // Validate the image, if present
        ]);

        $data = $request->only(['name', 'job_title']);

        // Handle the file upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Delete old image if exists
            if ($teamMember->image_path) {
                Storage::delete('public/' . $teamMember->image_path);
            }
            $data['image_path'] = $request->image->store('team', 'public');
        }

        $teamMember->update($data);

        return redirect()->route('admin.team.index')->with('success', 'Team member updated successfully.');
    }

    public function destroy(TeamMember $teamMember)
    {
        if ($teamMember->image_path) {
            Storage::delete('public/' . $teamMember->image_path);
        }

        $teamMember->delete();
        return redirect()->route('admin.team.index')->with('success', 'Team member deleted successfully.');
    }
}
