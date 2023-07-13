<?php

namespace Codedor\FilamentAdminBar\Providers;

use Codedor\FilamentAdminBar\Http\Livewire as Components;
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
    }
}
