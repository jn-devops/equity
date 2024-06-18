<?php

namespace Homeful\Equity\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Homeful\Equity\Equity
 */
class Equity extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Homeful\Equity\Equity::class;
    }
}
