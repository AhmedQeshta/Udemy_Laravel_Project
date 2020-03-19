<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class SearchScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        if ($search = request('search')) {
            $builder->where('first_name', 'LIKE', "%{$search}%");
            $builder->orWhere('last_name', 'LIKE', "%{$search}%");
            $builder->orWhere('email', 'LIKE', "%{$search}%");
            $builder->orWhereHas('company', function ($query) use ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
            });
        }
    }
}