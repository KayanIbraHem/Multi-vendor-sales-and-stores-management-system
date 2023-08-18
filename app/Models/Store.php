<?php

namespace App\Models;

use App\Models\Scopes\PerShopScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public function items()
    {
        return $this->belongsToMany(Item::class, 'item_store');
    }
    public function scopeFilter(Builder $builder): Builder
    {
        return $builder->when(request()->get('search'), fn ($query, $name) => $query->where('name', 'LIKe', "%{$name}% "));
    }

    protected static function booted(): void
    {
        static::addGlobalScope(new PerShopScope); // assign the Scope here
    }

    protected static function boot(): void
    {
        parent::boot();

        self::creating(function ($model) {
            $model->shop_id = auth()->user()->shop_id;
        });
    }
}
