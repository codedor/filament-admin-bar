<?php

namespace Codedor\FilamentAdminBar\Providers;

use Codedor\FilamentAdminBar\Livewire as Components;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentAdminBarServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-admin-bar')
            ->setBasePath(__DIR__ . '/../')
            ->hasViews()
            ->hasConfigFile()
            ->hasAssets();
    }

    public function bootingPackage()
    {
        Livewire::component('admin-bar', Components\AdminBar::class);
        Livewire::component('translatable-strings-tab', Components\TranslatableStringsTab::class);

        FilamentAsset::register([
            Css::make('filament-admin-bar-stylesheet', __DIR__ . '/../../dist/assets/filament-admin-bar.css'),
        ], 'codedor/filament-admin-bar');
    }
}
