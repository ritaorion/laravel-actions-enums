<?php

namespace RitaOrion\LaravelActionsEnums;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use RitaOrion\LaravelActionsEnums\Commands\ActionsCommand;
use RitaOrion\LaravelActionsEnums\Commands\EnumsCommand;

class LaravelActionsEnumsServiceProvider extends PackageServiceProvider
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
            ->hasCommands([
                ActionsCommand::class,
                EnumsCommand::class
            ]);
        
    }
}