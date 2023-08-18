<?php

namespace App\Models;

use App\Models\Scopes\PerShopScope;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['shop_id', 'user_id', 'client_id', 'bill_date', 'total'];

    public function user()
    {
        return $this->belongsTo(User::class)->select('id', 'name')->withDefault(['id' => null, 'name' => 'Deleted']);
    }

    public function client()
    {
        return $this->belongsTo(Client::class)->select('id', 'name')->withDefault(['id' => null, 'name' => 'Deleted']);
    }

    public function details()
    {
        return $this->hasMany(InvoiceDetail::class);
    }

    public static function getMaxNumber()
    {
        return self::max('bill_no') + 1;
    }

    protected function total(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => number_format($value, 2)
        );
    }

    protected function billDate(): Attribute
    {
        return Attribute::make(get: fn ($value) => Carbon::parse($value)->format('Y-m-d H:i:s'));
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
            $model->user_id = auth()->id();
            $model->bill_no = self::getMaxNumber();
        });
    }
}
