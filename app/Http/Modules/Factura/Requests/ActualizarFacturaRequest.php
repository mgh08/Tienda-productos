<?php

namespace App\Http\Modules\Factura\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ActualizarFacturaRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'fecha'         =>   'date|required',
            'cliente_id'    =>   'integer|required',
            'modo_pago_id'  =>   'integer|required',
            'cantidad'      =>   'required',
            'precio'        =>   'required',
            'productos'     =>   'required'
        ];
    }

    public function FailedValidation(Validator $validator)
    {
        throw(new HttpResponseException(response()->json($validator->errors(), 422)));
    }

}
