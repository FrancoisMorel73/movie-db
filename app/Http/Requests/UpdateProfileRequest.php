<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $this->user()->id,
            'current_password' => 'nullable|required_with:new_password|string',
            'new_password' => 'nullable|string|min:8|confirmed',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'name.required' => 'Le nom est obligatoire.',
            'name.string' => 'Le nom doit être une chaîne de caractères.',
            'name.max' => 'Le nom ne doit pas dépasser :max caractères.',
            'email.required' => 'L\'adresse e-mail est obligatoire.',
            'email.email' => 'L\'adresse e-mail doit être valide.',
            'email.max' => 'L\'adresse e-mail ne doit pas dépasser :max caractères.',
            'email.unique' => 'L\'adresse e-mail est déjà utilisée.',
            'current_password.required_with' => 'Le mot de passe actuel est obligatoire si vous souhaitez changer de mot de passe.',
            'current_password.string' => 'Le mot de passe actuel doit être une chaîne de caractères.',
            'new_password.string' => 'Le nouveau mot de passe doit être une chaîne de caractères.',
            'new_password.min' => 'Le nouveau mot de passe doit contenir au moins :min caractères.',
            'new_password.confirmed' => 'La confirmation du nouveau mot de passe ne correspond pas.',
        ];
    }
}
