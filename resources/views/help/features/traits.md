# Traits

The application includes four reusable traits in `app/Traits`. The examples below describe the APIs in the current checkout.

## FileUpload

`App\Traits\FileUpload` adds upload handling and file metadata helpers to an Eloquent model. A model using it must implement `fileUploads()` and may configure one or many attributes.

```php
use App\Traits\FileUpload;

class User extends Authenticatable
{
    use FileUpload;

    protected function fileUploads(): array
    {
        return [
            'avatar' => [
                'disk' => 'public',
                'folder' => 'users/avatars',
                'as_base64' => true,
            ],
            'resume' => [
                'disk' => 'private',
                'folder' => 'users/resumes',
            ],
        ];
    }
}
```

Each entry supports:

- `disk` — Laravel filesystem disk; defaults to `public`
- `folder` — storage folder; defaults to the model table name
- `as_base64` — stores an uploaded image as a data URI instead of a filesystem object; defaults to `false`

For attributes that only need the defaults, the short form is also valid:

```php
protected function fileUploads(): array
{
    return ['avatar', 'resume'];
}
```

### Accepted values and lifecycle

A configured attribute can contain an `UploadedFile`, a stored path, an HTTP or HTTPS URL, a base64 image data URI, or `null`.

- Uploaded files are converted or stored automatically during the model `saving` event.
- Replacing a stored file deletes the previous stored file after the replacement succeeds.
- Setting the attribute to `null` or an empty string removes the previous stored file.
- Deleting the model removes all configured files that are filesystem paths.
- Remote URLs and embedded base64 data are never passed to `Storage::delete()`.
- Base64 storage accepts images only and rejects other uploaded file types.

Validate uploads before assigning them to a model:

```php
'avatar' => ['nullable', 'image', 'max:2048'],
```

### File helpers

All helpers accept an optional configured attribute. When it is omitted, the first configured attribute is used.

```php
$user->hasFile('avatar');
$user->fileUrl('avatar');
$user->fileIsImage('avatar');
$user->fileName('avatar');
```

The same information is available through dynamic model attributes:

```php
$user->avatar_url;
$user->avatar_is_image;
$user->avatar_name;
$user->avatar_exists;
```

`hasFile()` checks the configured disk for stored paths. Base64 images and valid HTTP(S) URLs are treated as present; it does not make a network request to verify a remote URL.

`fileIsImage()` recognises base64 images and paths ending in `jpg`, `jpeg`, `png`, `gif`, `webp`, `bmp`, `svg`, or `avif`.

### Custom stored filenames

By default, Laravel generates the stored filename. Override `targetPathForUploadedFile()` when a model needs a deterministic path:

```php
protected function targetPathForUploadedFile(UploadedFile $file, array $config): ?string
{
    return $config['folder'].'/'.$this->getKey().'.'.$file->extension();
}
```

Return `null` to retain the default generated filename. This hook is used only for filesystem storage, not `as_base64` uploads.

The current `User` model configures `avatar` with `as_base64` enabled.

## Searchable

`App\Traits\Searchable` adds a chainable `search()` Eloquent scope. It searches local columns and direct relationship columns with a grouped set of `OR ... LIKE` conditions.

Define the model's default search fields with a protected `$searchable` array:

```php
use App\Traits\Searchable;

class Post extends Model
{
    use Searchable;

    protected array $searchable = [
        'title',
        'reference',
        'author.name',
    ];
}

$posts = Post::query()->search($search)->get();
```

You can override the configured fields for one query:

```php
$users = User::query()
    ->search($search, ['name', 'email', 'role'])
    ->paginate();
```

The scope trims the term and leaves the query unchanged when the term is blank or the attribute list is empty. Local columns are table-qualified, which avoids ambiguous-column errors when the query contains joins.

Relationship fields use `relation.column` syntax and `orWhereHas()`. They support one relationship level. Handle nested relationships or combined-name searches explicitly in the owning query or service.

## Sortable

`App\Traits\Sortable` adds a chainable `sortable()` scope for local columns and columns on direct `BelongsTo` or `HasOne` relationships.

For request-driven sorting, define a protected `$sortable` allowlist. Numeric entries expose a column directly; associative entries map a public sort key to one or more real columns.

```php
use App\Traits\Sortable;

class Post extends Model
{
    use Sortable;

    protected array $sortable = [
        'title',
        'published_at',
        'author' => 'author.surname,author.forename',
    ];
}
```

The scope accepts a string, a comma-separated list, or an array of columns:

```php
Post::query()->sortable('title', 'asc')->get();
Post::query()->sortable('author', 'desc')->get();
Post::query()->sortable(['published_at', 'title'], 'desc')->get();
```

An optional third argument supplies a fallback when the requested public key is not allowed:

```php
Post::query()->sortable($sort, $direction, 'published_at')->get();
```

Without an explicit fallback, an unknown key falls back to `id`. If the model has no `$sortable` property, legacy permissive behaviour is retained, although every resolved column is still checked against the database schema.

Relationship fields use `relation.column` syntax. The trait adds a left join, supports direct `BelongsTo` and `HasOne` relations, reuses a relation join for multi-column sorting, and selects the parent table columns to keep Eloquent hydration stable. Missing relationships and columns raise an exception instead of being interpolated into SQL.

Always validate a request-provided direction as `asc` or `desc` before passing it to the scope. The trait validates sort keys and database columns, but it does not normalise the direction.

## EnumOptions

`App\Traits\EnumOptions` converts a string- or integer-backed enum into form-friendly arrays.

```php
use App\Traits\EnumOptions;

enum Role: string
{
    use EnumOptions;

    case ADMIN = 'admin';
    case USER = 'user';
    case GUEST = 'guest';
}
```

`options()` returns enum values as keys and case names as labels:

```php
Role::options();

// [
//     'admin' => 'ADMIN',
//     'user' => 'USER',
//     'guest' => 'GUEST',
// ]
```

`values()` returns only the backed values and is useful for validation:

```php
Role::values();

// ['admin', 'user', 'guest']
```

Use bound Blade attributes when passing enum options and dynamic values to components:

```blade
<x-ui::form.select-group
    label="Role"
    name="role"
    :options="\App\Enums\Role::options()"
    :value="old('role', $user->role->value)"
/>
```
