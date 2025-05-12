# Instructions

This template can be installed by cloning the repository from Github as follows

```
git clone https://github.com/termon/blade-starter-kit.git
```

1. Create a `.env` file by copying the template `.env.example` provided and modify as necessary. 
2. Run migrations `php artisan migrate --seed`
3. Run `composer update && npm install` 
4. Finally run the application using `composer run dev`

### Notes

The template has installed the `termon\ui` Blade UI kit  and `AlpineJS` for interactivity.

The template also includes `Livewire` and `Volt` to allow creation/usage of Livewire components 

The application provides two layouts `sidebar` (default) and `navbar`. To change the layout edit `views\components\layouts\app.blade.php`

The `DatabaseSeeder` includes two default users `admin@mail.com` and `guest@mail.com` both with a default password of `password`.
