<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitRequest extends FormRequest
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
            'name' => 'required|string|unique:units,name,' . $this->route('unit') . ',id,shop_id,' . auth()->user()->shop_id,
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'الوحده',
        ];
    }

    protected function prepareForValidation(): void
    {
        //
    }
}
