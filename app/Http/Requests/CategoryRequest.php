<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{

    public function authorize(): bool
    {
        return backpack_auth()->check();
    }

    public function prepareForValidation(): void
    {
        if (is_string($this->name)) {
            $this->merge([
                'name' => json_decode($this->name, true),
            ]);
        }
    }

    public function rules(): array
    {
        return [
            'name' => 'required|array|min:1',
            'name.0.uz' => 'required|string',
            'name.0.ru' => 'required|string',
            'name.0.en' => 'required|string',
        ];
    }


    public function attributes()
    {
        return [
            //
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
