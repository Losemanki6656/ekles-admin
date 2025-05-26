<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    public function prepareForValidation(): void
    {
        foreach (['title', 'description'] as $field) {
            if (is_string($this->$field)) {
                $this->merge([
                    $field => json_decode($this->$field, true),
                ]);
            }
        }
    }

    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|array|min:1',
            'title.0.uz' => 'required|string',
            'title.0.ru' => 'required|string',
            'title.0.en' => 'required|string',
            'description' => 'required|array|min:1',
            'description.0.uz' => 'required|string',
            'description.0.ru' => 'required|string',
            'description.0.en' => 'required|string',
            'published' => 'nullable|boolean',
        ];
    }

    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
