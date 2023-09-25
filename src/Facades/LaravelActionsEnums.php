<?php

namespace Ritaorion\LaravelActionsEnums\Facades;

use Illuminate\Support\Facades\Facade;


class LaravelActionsEnums extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Ritaorion\LaravelActionsEnums\LaravelActionsEnums::class;
    }
}
