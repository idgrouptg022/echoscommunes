<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReporterRequest extends FormRequest
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
            "firstname" => "required|max:255",
            "lastname" => "required|max:255",
            "email" => ["required", "email", "max:255", Rule::unique('reporters', 'email')->ignore($this->route("reporter"))],
            "phone" => "required|numeric",
            "password" => "required|min:7|confirmed"
        ];
    }

    public function messages(): array
    {
        return [
            "firstname.required" => "Prénom(s) requis",
            "firstname.max" => "Prénom(s) trop long",
            "lastname.required" => "Nom requis",
            "lastname.max" => "Nom trop long",
            "email.required" => "Adresse e-mail requise",
            "email.email" => "Adresse e-mail invalide",
            "email.max" => "Adresse e-mail trop longue",
            "email.unique" => "Adresse e-mail déjà utilisée",
            "phone.required" => "Téléphone requis",
            "phone.numeric" => "Téléphone doit être numérique",
            "password.required" => "Mot de passe requis",
            "password.min" => "Mot de passe doit faire au moins 7 caractères",
            "password.confirmed" => "Mot de passe doit être identique à la confirmation"
        ];
    }
}
