<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualiteRequest extends FormRequest
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
            "title" => "required|string|max:255",
            "image" => "nullable|file|image|mimes:png,jpg,jpeg,svg,webp",
            "body" => "required|string"
        ];
    }

    public function messages(): array
    {
        return [
            "title.required" => "Le titre de l'actualité est obligatoire",
            "title.string" => "Le titre de l'actualité est mal renseigné",
            "title.max" => "Le titre de l'actualité est trop long",
            "image.file" => "L'image de l'actualité doit être un fichier",
            "image.image" => "L'image de l'actualité doit être une image",
            "image.mimes" => "L'image de l'actualité doit être un fichier png, jpeg, jpg, svg, webp",
            "body.required" => "Le corps de l'actualité est obligatoire",
            "body.string" => "Le corps de l'actualité est mal renseigné"
        ];
    }
}
