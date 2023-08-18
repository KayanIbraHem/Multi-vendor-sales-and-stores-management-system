<?php

namespace App\Models;

use App\Models\Scopes\PerShopScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvoiceDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['invoice_id', 'shop_id', 'unit_id', 'category_id', 'sale_price', 'pay_price', 'qty'];
    protected $table = 'inovice_details';

    public function unit()
    {
        return $this->belongsTo(Unit::class)->select('id', 'name');
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->select('id', 'name');
    }

    protected function salePrice(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => number_format($value, 2)
        );
    }

    protected function payPrice(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => number_format($value, 2)
        );
    }

    protected function qty(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => number_format($value, 2)
        );
    }

    public function scopeFilter(Builder $builder): Builder
    {
        return $builder;
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
