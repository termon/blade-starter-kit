<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\IndexUsersRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Mirror\Facades\Mirror;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexUsersRequest $request): View
    {
        $validated = $request->validated();
        $sort = $validated['sort'] ?? 'id';
        $direction = $validated['direction'] ?? 'asc';
        $search = $validated['search'] ?? '';
        $size = $validated['size'] ?? 10;

        $users = User::search($search, ['name', 'email', 'role'])
            ->sortable($sort, $direction)
            ->paginate($size)
            ->withQueryString();

        return view('users.index', ['users' => $users, 'search' => $search]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        Gate::authorize('update', $user);

        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function start(User $user): RedirectResponse
    {
        if (! Auth::user()->canImpersonate()) {
            return redirect()->route('home', 303)
                ->with('error', 'You do not have permission to impersonate another user.');
        }

        if (! $user->canBeImpersonated()) {
            return redirect()->route('home', 303)
                ->with('error', 'You cannot impersonate this user.');
        }

        Mirror::start($user);

        return redirect()->route('home')->with('info', 'You are now impersonating '.$user->name.'.');
    }

    public function stop(): RedirectResponse
    {
        if (Mirror::isImpersonating()) {
            Mirror::stop();

            return redirect()->route('home')->with('success', 'Impersonation ended.');
        }

        return redirect()->route('home')->with('info', 'You are currently not impersonating anyone');
    }
}
