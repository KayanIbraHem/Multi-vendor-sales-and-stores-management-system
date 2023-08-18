<?php

namespace App\Models;

use App\Models\Scopes\PerShopScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'category_id'];

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }

    public function child()
    {
        return $this->hasMany(Category::class, 'category_id')->select('id', 'name', 'category_id')->with('child');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id')->select('id', 'name', 'category_id');
    }

    public static  function mainCategory(int $category )
    {
        return self::where('id', '<>', $category)->where('category_id', 0)->get();
    }

    public function scopeFilter(Builder $builder): Builder
    {
        return $builder->when(request()->get('search'), fn($query, $name) => $query->where('name', 'LIKE', "%$name%"));
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
