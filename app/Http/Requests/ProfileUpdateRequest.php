<?php

namespace App\Http\Requests;

use App\Models\Usuario;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
  public function rules(): array
{
    return [
        'nombre_usuario' => ['required', 'string', 'max:100'],
        'email_usuario' => [
            'required',
            'string',
            'lowercase',
            'email',
            'max:100',
            Rule::unique(Usuario::class)->ignore($this->user()->id),
        ],
    ];
}
}
