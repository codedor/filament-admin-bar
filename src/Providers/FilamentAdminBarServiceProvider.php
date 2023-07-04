<?php

namespace Codedor\FilamentAdminBar\Providers;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentAdminBarServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-admin-bar')
            ->setBasePath(__DIR__ . '/../')
            ->hasConfigFile();
    }
}
