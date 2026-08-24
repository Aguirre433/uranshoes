<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreComprobantesRequest extends FormRequest
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
            'tipo' => ['required', 'string', 'max:30'],
            'serie' => ['nullable', 'string', 'max:20'],
            'numero' => ['required', 'string', 'max:50'],
            'fecha_emision' => ['required', 'date'],
            'fecha_vencimiento' => ['nullable', 'date', 'after_or_equal:fecha_emision'],
            'cliente_id' => ['nullable', 'exists:clientes,id'],
            'proveedor_id' => ['nullable', 'exists:proveedors,id'],
            'sucursal_id' => ['nullable', 'exists:sucursals,id'],
            'subtotal' => ['required', 'numeric', 'min:0'],
            'iva' => ['nullable', 'numeric', 'min:0'],
            'impuestos' => ['nullable', 'numeric', 'min:0'],
            'monto_total' => ['required', 'numeric', 'min:0'],
            'estado' => ['required', 'string', 'max:20'],
            'detalle' => ['nullable', 'string'],
        ];
    }
}
