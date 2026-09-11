# Impersonation

This project demos `franbarbalopez/mirror` through the user-management flow.

## Model setup

`User` uses the package trait:

```php
use Mirror\Concerns\Impersonatable;

class User extends Authenticatable
{
    use Impersonatable;
}
```

The model also defines the local rules:

```php
public function canImpersonate(): bool
{
    return $this->role === Role::ADMIN;
}

public function canBeImpersonated(): bool
{
    return $this->role !== Role::ADMIN;
}
```

## Controller usage

`UserController::start()`:

- loads the target user
- checks `Auth::user()->canImpersonate()`
- checks `$user->canBeImpersonated()`
- calls `Mirror::start($user)`

`UserController::stop()`:

- checks `Mirror::isImpersonating()`
- calls `Mirror::stop()`

## View usage

The users table shows an impersonate action for impersonatable users:

```blade
@if ($user->canBeImpersonated())
    <form method="POST" action="{{ route('users.mirror.start', $user) }}">
        @csrf
        <x-ui::button variant="none" type="submit" title="Impersonate user">
            <x-ui::svg icon="finger-print" size="sm" />
        </x-ui::button>
    </form>
@endif
```

The sidebar toolbar shows a stop action while impersonation is active:

```blade
@impersonating
    <x-ui::sidebar.form-link
        :action="route('users.mirror.stop')"
        icon="exit"
        method="post"
        label="Stop impersonating"
    />
@endimpersonating
```

## Routes

- `users.mirror.start`
- `users.mirror.stop`

Both actions use `POST` so Laravel's CSRF protection applies. Authenticated application routes use `mirror.ttl`, while account, password, and user mutations use `mirror.prevent` to block sensitive changes during impersonation. The default session lifetime is controlled by `MIRROR_TTL` and is one hour.

Use this pattern when admins need to temporarily assume another user's session for support or troubleshooting.
