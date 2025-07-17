# Frequently Asked Questions

## Getting Started

### What is the Laravel Blade Starter Kit?
A modern Laravel application template that includes authentication, the termon/ui component library, Livewire/Volt for interactivity, and a complete help documentation system. It's designed to accelerate development of professional web applications.

### What technologies are included?
- **Laravel 12** - Latest Laravel framework
- **Termon/UI Package** - Professional Blade component library
- **Livewire 3.0** - Full-stack reactivity for Laravel
- **Volt** - Single-file Livewire components
- **AlpineJS** - Minimal framework for interactive behavior
- **Tailwind CSS** - Utility-first CSS framework
- **SQLite** - Default database (easily changeable)

### What are the default login credentials?
- **Admin**: `admin@mail.com` / `password`
- **Guest**: `guest@mail.com` / `password`

These users are created automatically when you run `php artisan migrate --seed`.

## Configuration & Customization

### How do I switch between layouts?
Edit `resources/views/components/layouts/app.blade.php` and change the layout import:
- **Sidebar layout**: `<x-ui::layout.sidebar>`
- **Navbar layout**: `<x-ui::layout.navbar>`

### How do I change the database from SQLite?
1. Update your `.env` file with your database credentials
2. Change `DB_CONNECTION` to your preferred database (mysql, postgresql, etc.)
3. Run `php artisan migrate --seed`

### How do I customize the theme colors?
The termon/ui components use Tailwind CSS. You can:
1. Modify `tailwind.config.js` to extend the color palette
2. Override component styles in your CSS
3. Use Tailwind's built-in color utilities

### How do I add new user roles?
1. Add new cases to `app/Enums/Role.php`
2. Update any middleware or authorization logic
3. Create new users with the role in your seeder

## Development

### How do I add new help pages?
Create `.md` files in `resources/views/help/` or subdirectories. The help system automatically:
- Discovers new pages
- Organizes them by folder
- Generates navigation and breadcrumbs
- Processes markdown content

### How do I create custom UI components?
Use the termon/ui components as building blocks:
```blade
<x-ui::card>
    <x-ui::card.header>My Custom Component</x-ui::card.header>
    <x-ui::card.body>
        <!-- Your content -->
    </x-ui::card.body>
</x-ui::card>
```

### How do I add Livewire components?
1. **Traditional Livewire**: `php artisan make:livewire MyComponent`
2. **Volt (single-file)**: Create a `.blade.php` file with `@volt` directive

### How do I enable real-time features?
The starter kit includes Livewire for real-time updates. For WebSocket support, consider:
- Laravel Reverb (included in Laravel 11+)
- Pusher
- Laravel WebSockets

## Troubleshooting

### Pages not loading correctly?
1. Ensure you've run migrations: `php artisan migrate --seed`
2. Clear application cache: `php artisan optimize:clear`
3. Compile assets: `npm run dev`

### Components not styling correctly?
1. Make sure Tailwind is compiled: `npm run dev`
2. Check that termon/ui is properly installed: `composer show termon/ui`
3. Clear view cache: `php artisan view:clear`

### Authentication not working?
1. Verify `.env` has `APP_KEY` set: `php artisan key:generate`
2. Check database connection and ensure users table exists
3. Clear route cache: `php artisan route:clear`

### Help system showing errors?
1. Verify markdown files exist in `resources/views/help/`
2. Check file permissions are readable
3. Ensure `symfony/dom-crawler` is installed for heading processing

## Advanced Usage

### Can I use this with APIs?
Yes! The starter kit includes Laravel Sanctum for API authentication. You can:
- Create API routes in `routes/api.php`
- Use Sanctum tokens for authentication
- Build SPA frontends that consume your API

### How do I deploy this application?
Follow standard Laravel deployment practices:
1. Set up production environment variables
2. Run `composer install --optimize-autoloader --no-dev`
3. Run `npm run build` for production assets
4. Configure your web server (nginx/Apache)
5. Set up SSL certificates

### Is this production-ready?
The starter kit provides a solid foundation, but you should:
- Review and enhance security settings
- Set up proper error monitoring
- Configure backups
- Implement proper logging
- Add comprehensive testing

## Getting More Help

- **Laravel Documentation**: https://laravel.com/docs
- **Livewire Documentation**: https://livewire.laravel.com
- **Tailwind CSS**: https://tailwindcss.com
- **Termon/UI Components**: https://github.com/termon/ui
