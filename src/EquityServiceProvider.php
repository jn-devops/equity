<?php

namespace Homeful\Equity;

use Homeful\Equity\Commands\EquityCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class EquityServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('equity')
            ->hasConfigFile('equity')
            ->hasViews()
            ->hasMigration('create_equity_table')
            ->hasCommand(EquityCommand::class);
    }
}
