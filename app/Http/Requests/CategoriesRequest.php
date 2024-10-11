<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoriesRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => [
                "required", "max:255", "string",
                Rule::unique("categories", "name")->ignore($this->route('category'))
            ]
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Veuillez renseigner le nom de la catégorie",
            "name.max" => "Le nom de la catégorie est trop long",
            "name.string" => "Le nom de la catégorie doit être un texte",
            "name.unique" => "Cette cégorie est déjà disponible"
        ];
    }
}
