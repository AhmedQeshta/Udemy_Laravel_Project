<?php

namespace App\Scopes;

use App\Scopes\FilterScope;
use App\Scopes\SearchScope;

trait FilterSearchScope
{
    protected static function bootFilterSearchScope()
    {
        static::addGlobalScope(new SearchScope);
        static::addGlobalScope(new FilterScope);
    }
}