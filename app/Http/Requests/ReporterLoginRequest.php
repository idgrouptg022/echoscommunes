<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReporterLoginRequest extends FormRequest
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
            "email" => "required|email|exists:reporters,email",
            "password" => "required"
        ];
    }

    public function messages(): array
    {
        return [
            "email.required" => "L'adresse email est requise",
            "email.email" => "L'email est invalide",
            "email.exists" => "L'email n'est associé à aucun compte",
            "password.required" => "Le mot de passe est requis"
        ];
    }
}
