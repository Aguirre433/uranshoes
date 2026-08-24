<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateComprobantesRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tipo' => ['sometimes', 'required', 'string', 'max:30'],
            'serie' => ['sometimes', 'nullable', 'string', 'max:20'],
            'numero' => ['sometimes', 'required', 'string', 'max:50'],
            'fecha_emision' => ['sometimes', 'required', 'date'],
            'fecha_vencimiento' => ['sometimes', 'nullable', 'date', 'after_or_equal:fecha_emision'],
            'cliente_id' => ['sometimes', 'nullable', 'exists:clientes,id'],
            'proveedor_id' => ['sometimes', 'nullable', 'exists:proveedors,id'],
            'sucursal_id' => ['sometimes', 'nullable', 'exists:sucursals,id'],
            'subtotal' => ['sometimes', 'required', 'numeric', 'min:0'],
            'iva' => ['sometimes', 'nullable', 'numeric', 'min:0'],
            'impuestos' => ['sometimes', 'nullable', 'numeric', 'min:0'],
            'monto_total' => ['sometimes', 'required', 'numeric', 'min:0'],
            'estado' => ['sometimes', 'required', 'string', 'max:20'],
            'detalle' => ['sometimes', 'nullable', 'string'],
        ];
    }
}
