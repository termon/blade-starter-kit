<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // get registration form
    public function create()
    {
        return view('user.register');
    }

    /**
     * Show the profile form.
     */
    public function edit()
    {
        return view('user.edit');
    }

    // post registration handler – create user
    public function store(Request $request)
    {
        // validate request form values
        $credentials = $request->validate([
            'name'  => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['confirmed', 'min:6']
        ]);

        // create user
        $user = User::create($credentials);

        // login newly authenticated user
        Auth::login($user);

        return redirect()->route("home")
            ->with('success', "Logged in Successfully");
    }

    /**
     * Update the user's profile details.
     */
    public function update(Request $request)
    {
        $user = $request->user();

        // Validate input
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'email', 'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => ['nullable', 'confirmed', 'min:8'],
        ]);

        // Update user details
        $user->name = $validated['name'];
        $user->email = $validated['email'];

        // Only update password if provided
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('home')->with('info', 'Profile updated successfully.');
    }

    // get login form
    public function login()
    {
        return view('user.login');
    }

    // post login handler – authenticate user session
    public function authenticate(Request $request)
    {
        // validate request form values
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // attempt to authenticate and generate session
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route("home")
                ->with('success', "Logged in Successfully");
        }

        // invalid credentials
        return redirect()->back()->withErrors([
            'email' => 'Invalid credentials',
            'password' => 'Invalid credentials'
        ]);
    }
    // post logout handler – delete user session
    public function logout(Request $request)
    {
        // remove authentication info from user session
        Auth::logout();

        // invalidate the user session
        $request->session()->invalidate();

        // regenerate the CSRF token
        $request->session()->regenerateToken();

        // redirect to home or login route
        return redirect()
            ->route("login")
            ->with('success', "Successfully logged out");
    }


}
