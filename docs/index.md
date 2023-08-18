# Admin bar for filament

## Introduction


## Installation

You can install the package via composer:

```bash
composer require codedor/filament-admin-bar
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-admin-bar-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-admin-bar-config"
```

This is the contents of the published config file:

```php
return [
    'tabs' => [
        Codedor\FilamentAdminBar\Tabs\SeoTab::class,
        Codedor\FilamentAdminBar\Tabs\TranslatableStringsTab::class,
    ],
    'translatable-strings-tab' => [
        'excluded' => [
            'filament-admin-bar::*',
            'routes.*',
        ],
    ],
];

```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-admin-bar-views"
```

## Usage

```blade
<livewire:admin-bar />
```
