<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutorUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'data_nacimento' => 'sometimes|required|string|max:20',
            'biografia' => 'sometimes|required|string|max:1024'
        ];
    }
}
