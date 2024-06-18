<?php

namespace Homeful\Equity\Commands;

use Illuminate\Console\Command;

class EquityCommand extends Command
{
    public $signature = 'equity';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
