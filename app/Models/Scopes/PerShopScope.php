<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class PerShopScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
   
    public function apply(Builder $builder, Model $model): void
    {
        $builder->when(auth()->check(), function ($query) use ($model) {
            $column = $model->getTable() == 'shops' ? 'id' : 'shop_id';
            $query->where("{$model->getTable()}.$column", auth()->user()->shop_id);
        })->orderBy("{$model->getTable()}.{$model->getKeyName()}", 'DESC');
    }
}
