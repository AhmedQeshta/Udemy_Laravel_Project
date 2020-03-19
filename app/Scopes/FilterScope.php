<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class FilterScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $columns = property_exists($model, 'filterColumns') ? $model->filterColumns : $this->filterColumns;
       
       foreach ($columns as $column)
       {
           if ($value = request($column)) {
               $builder->where($column, $value);
           }
       }   
    }
}