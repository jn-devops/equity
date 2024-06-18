<?php

namespace Homeful\Equity;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Homeful\Equity\Commands\EquityCommand;

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
