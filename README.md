# Instructions

This template can be installed by cloning the repository from Github as follows, where `<app-name>` is the name of the application you want to create.

```
git clone https://github.com/termon/blade-starter-kit.git <app-name>
```

### Initialise Application

1. Run `composer install && npm install` to install the PHP and Vite dependencies.
2. Create a `.env` file from `.env.example`, then run `php artisan key:generate`.
3. Run migrations with `php artisan migrate:fresh --seed`.
4. Start the application using `composer run dev`.

Alternatively, `composer run setup` performs the dependency installation, environment setup, key generation, migrations, and frontend build.

### Notes

The template contains custom blade `ui` components and `AlpineJS` for interactivity.

The template also includes `Livewire 4` to allow creation/usage of Livewire components 

The application provides two layouts `sidebar` (default) and `navbar`. To change the layout edit `views\components\layouts\app.blade.php`

In the local environment only, `DatabaseSeeder` creates `admin@mail.com`, `user@mail.com`, and `guest@mail.com` with the development-only password `password`. Demo accounts are skipped in other environments.
