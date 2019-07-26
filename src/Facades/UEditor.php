<?php

namespace Hongyukeji\LaravelUEditor\Facades;

use Illuminate\Support\Facades\Facade;

class UEditor extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ueditor';
    }
}