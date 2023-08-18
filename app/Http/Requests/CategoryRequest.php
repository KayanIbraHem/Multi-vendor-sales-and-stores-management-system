<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:190',
            'category_id' => 'nullable|numeric',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => trans('categories.name'),
            'category_id' => trans('categories.category_id'),
        ];
    }

    protected function prepareForValidation(): void
    {
        //
    }
}
