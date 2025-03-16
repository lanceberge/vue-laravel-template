<?php

namespace App\Http\Controllers;

use App\Data\EmailSubscriptionDTO;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\EmailSubscription;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        $user = $request->user();
        $subscriptions = $user->emailSubscription()->firstOrCreate(
            ['user_id' => $user->id],
            array_fill_keys(EmailSubscription::$emailListFieldNames, true)
        );

        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $user instanceof MustVerifyEmail,
            'status' => session('status'),
            'subscriptions' => collect(EmailSubscription::$subscriptionToModelMap)
                ->map(function ($name, $field) use ($subscriptions) {
                    return new EmailSubscriptionDTO(
                        $name,
                        $field,
                        $subscriptions->$field
                    );
                })->values()
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

        return Redirect::route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
