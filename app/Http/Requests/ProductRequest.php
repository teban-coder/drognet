<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Nombre' => 'required',
            'IdTipoMedicamento' => 'required',
            'Imagen' => 'required',
            'Laboratorio' =>'required',
            'Precio' => 'required',
            'Lote' => 'required,'
            'FechaVencimiento' => 'required'
        ];
    }
}
