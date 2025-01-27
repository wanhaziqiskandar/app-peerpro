<?php

namespace App\Http\Controllers;

use App\Models\TutorSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Show the profile update form.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the user's profile information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone_number' => 'required|string|max:255',
            'gender' => 'nullable|string|max:255',
            // Only validate the tutor-specific fields if they exist in the request
            'experience' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:255',
            'qualifications' => 'nullable|string|max:255',
            'price_rate' => 'nullable|numeric',
        ];

        // Only validate the fields that are present in the request
        $validatedData = $request->validate(array_filter($rules, fn($rule, $key) => $request->has($key), ARRAY_FILTER_USE_BOTH));
        // dd($request->expertise);
        if($request->expertise){
            foreach($request->expertise as $subject){
                if(!$user->subjects()->where('subject_id', $subject)->exists()){
                    TutorSubject::insert([
                        'tutor_id' => $user->id,
                        'subject_id' => $subject,
                    ]);
                } elseif($inactive_subject = $user->subjects()->where('subject_id', $subject)->where('is_active',0)->first()){
                    $inactive_subject->timestamps = false;
                    $inactive_subject->update([
                        'is_active' => 1,
                    ]);
                }
            }
            $remove_subjects = $user->subjects()->whereNotIn('subject_id', $request->expertise)->get();
            // dd($remove_subjects);
            foreach($remove_subjects as $subject){
                $subject->timestamps=false;
                $subject->update(['is_active'=> 0]);
                // dd($subject);
            }
        }
        // Update the user with the validated data
        $user->update($validatedData);

        // If you're updating additional information, return the appropriate response
        return back()->with('status', 'profile-updated');
    }




    /**
     * Delete the user's account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        // Validate the user's password
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        // Get the authenticated user
        $user = $request->user();

        // Log out the user
        Auth::logout();

        // Delete the user
        $user->delete();

        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to the homepage
        return redirect('/');
    }
}
