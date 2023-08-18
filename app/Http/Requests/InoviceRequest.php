<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InoviceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'client_id' => 'required|exists:clients,id,shop_id,' . shopId(),
            'store_id' => 'required|exists:stores,id,shop_id,' . shopId(),
            'bill_date' => 'required|date|date_format:Y-m-d',
            'items' => 'required|array|min:1',
            'items.*.item_id' => 'required|exists:items,id,shop_id,' . shopId(),
            'items.*.unit_id' => 'required|exists:units,id,shop_id,' . shopId(),
            'items.*.category_id' => 'required|exists:categories,id,shop_id,' . shopId(),
            'items.*.sale_price' => 'required|numeric',
            'items.*.qty' => 'required|numeric',
        ];
    }

    public function attributes(): array
    {
        return [
            'client_id'   => 'client_id',
            'store_id'    => 'store_id',
            'bill_date'   => 'bill_date',
            'items'       => 'items',
            'item_id'     => 'item_id',
            'unit_id'     => 'unit_id',
            'category_id' => 'category_id',
            'sale_price'  => 'sale_price',
            'qty'         => 'qty',
        ];
    }

    protected function prepareForValidation(): void
    {
        //
    }
}
