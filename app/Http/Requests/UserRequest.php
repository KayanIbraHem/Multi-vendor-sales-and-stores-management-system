<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name'     => 'required|string|min:2|max:190',
            'email'    => 'required|string|unique:users,email,'.$this->route('user'),
            'password' => (request()->method() == 'post' ? 'required' : 'nullable') . '|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'name'     => trans('users.name'),
            'email'    => trans('users.email'),
            'password' => trans('users.password'),
        ];
    }

    protected function prepareForValidation(): void
    {
        if ( is_null($this->password) ) $this->request->remove('password');
    }
}
