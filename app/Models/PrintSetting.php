<?php

namespace App\Models;

use App\Models\Scopes\PerShopScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrintSetting extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'show_client_name',
        'show_client_phone',
        'show_client_address',
        'show_shop_logo',
        'show_shop_name',
        'show_shop_address',
        'show_item_name',
        'show_unit',
        'show_qty',
        'show_sale_price',
        'show_barcode',
        'show_item_total',
        'show_index',
        'show_invoice_no',
        'show_date',
        'show_qrcode',
        'show_creator',
        'shop_id'
    ];


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
