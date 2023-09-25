<?php

namespace RitaOrion\LaravelActionsEnums;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use RitaOrion\LaravelActionsEnums\app\Commands\actions;
use RitaOrion\LaravelActionsEnums\app\Commands\enums;

class LaravelActionsEnusServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-actions-enums')
            ->hasCommand(actions::class);
            ->hasCommand(enums::class);
    }
}