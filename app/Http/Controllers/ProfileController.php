<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        $user = Auth::user(); // Retrieve the authenticated user
        return view('profile.index', ['user' => $user]);
    }    

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
{
    return view('profile.edit', [
        'user' => $request->user(),
    ]);
}

    

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function orders(Request $request): View
{
    $orders = $request->user()->orders; // Assuming you have a relationship set up

    return view('profile.orders', compact('orders'));
}

public function reservations(Request $request): View
{
    $reservations = $request->user()->reservations; // Assuming you have a relationship set up

    return view('profile.reservations', compact('reservations'));
}
}
