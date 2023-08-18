<?php

namespace App\Models;

use App\Models\Scopes\PerShopScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['shop_id', 'category_id', 'unit_id', 'name',  'desc',  'min', 'sale_price', 'pay_price', 'is_active'];

    public function stores()
    {
        return $this->belongsToMany(Store::class, 'item_store', 'item_id', 'store_id')->withPivot('quantity');
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->select('id', 'name');;
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class)->select('id', 'name');;
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }

    public function scopeFilter(Builder $builder): Builder
    {
        return $builder->when(request()->get('name'), fn ($query, $name) => $query->where('name', 'LIKE', "%{$name}%"));
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
