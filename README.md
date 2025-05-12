# Instructions

## Install Livewire/Volt

```
composer require livewire/livewire
composer require livewire/volt

php artisan volt:install
```

## Install Termon UI

Add following to `composer.json`

```
"repositories": [
    {
        "type": "git",
        "url": "https://github.com/termon/ui"
    }
],
```

Then install 

```
composer require termon/ui
```
