<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $subjects = Subject::all();
        // dd($subjects);
        return view('auth.register', [
            'subjects' => $subjects,
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->expertise);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'age' => ['required', 'integer'],  // Store as integer
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'phone_number' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'experience' => ['nullable', 'string', 'max:255'],  // Allow null for experience
            // 'expertise' => ['nullable', 'string', 'max:255'],   // Allow null for expertise
            'account_number' => ['nullable', 'string', 'max:255'], // Allow null for account_number
            'qualifications' => ['nullable', 'string', 'max:255'], // Allow null for qualifications
            'price_rate' => ['required_if:role,tutor', 'nullable', 'numeric', 'min:0', 'max:1000.00'], // Price rate as numeric with min/max
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        // dd($request);

        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'gender' => $request->gender,
            'age' => $request->age, // Store as integer
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'role' => $request->role,
            'experience' => $request->experience,
            'expertise' => $request->expertise,
            'account_number' => $request->account_number,
            'qualifications' => $request->qualifications,
            'price_rate' => $request->price_rate, // Store as decimal
            'password' => Hash::make($request->password),
            // 'email_verified_at' => now(), // Optional if email verification isn't used
        ]);

        if ($user->isTutor()) {
            foreach ($request->expertise as $expertise) {
                $user->subjects()->insert([
                    'tutor_id' => $user->id,
                    'subject_id' => $expertise,
                ]);
            }
        }

        event(new Registered($user));

        Auth::login($user);

        // if($user->isTutor()){
        //     return redirect(route('profile.edit'));
        // } else {
        //     return redirect(route('dashboard', absolute: false));
        // }
        if ($user->isTutor()) {
            return redirect(route('dashboard', absolute: false));
        }
    }
}
