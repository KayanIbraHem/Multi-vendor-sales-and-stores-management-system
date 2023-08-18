<?php

namespace App\Models;

use App\Models\Scopes\PerShopScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'phone', 'is_active'];

    public function user()
    {
        return $this->hasMany(User::class, 'shop_id', 'id');
    }
    public function categories()
    {
        return $this->hasMany(Category::class, 'shop_id', 'id');
    }
    public function scopeFilter(Builder $builder): Builder
    {
        return $builder;
    }

    protected static function booted(): void
    {
        static::addGlobalScope(new PerShopScope); // assign the Scope here
    }

    // protected static function boot(): void
    // {
    //     parent::boot();

    //     self::creating(function ($model) {
    //         $model->shop_id = auth()->user()->shop_id;
    //     });
    // }
}
