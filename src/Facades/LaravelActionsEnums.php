<?php

namespace RitaOrion\LaravelActionsEnums\Facades;

use Illuminate\Support\Facades\Facade;


class LaravelActionsEnums extends Facade
{
    protected static function getFacadeAccessor()
    {
        return RitaOrion\LaravelActionsEnums\LaravelActionsEnums::class;
    }
}