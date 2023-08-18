<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id,shop_id,' . shopId(),
            'unit_id'     => 'required|exists:units,id,shop_id,' . shopId(),
            'name'        => 'required|string|unique:items,name,'.$this->route('item').',id,shop_id,'.shopId(),
            'desc'        => 'nullable|string',
            'image'       => 'nullable|image',
            'min'         => 'nullable|numeric',
            'sale_price'  => 'nullable|numeric|min:0',
            'pay_price'   => 'nullable|numeric|min:0',
            'is_active'   => 'nullable|boolean',
            'barcode'   => 'nullable|boolean'
        ];
    }

    public function attributes(): array
    {
        return [
            'category_id' => trans('menu.the category'),
            'unit_id'     => trans('menu.the unit'),
            'name'        => trans('items.name'),
            'barcode'     => trans('items.barcode'),
            'desc'        => trans('items.desc'),
            'image'       => trans('items.image'),
            'min'         => trans('items.min'),
            'sale_price'  => trans('items.sale_price'),
            'pay_price'   => trans('items.pay_price'),
            'is_active'   => trans('items.show-in-sales'),
        ];
    }

    protected function prepareForValidation(): void
    {
        //
    }
}
