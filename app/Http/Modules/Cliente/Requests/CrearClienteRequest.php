<?php

namespace App\Http\Modules\Cliente\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CrearClienteRequest extends FormRequest
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
            'nombre'               =>      'string|required',
            'apellido'             =>      'string|required',
            'direccion'            =>      'string',
            'fecha_nacimiento'     =>      'date|required',
            'telefono'             =>      'integer|required',
            'email'                =>      'email|required'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw(new HttpResponseException(response()->json($validator->errors(), 422)));
    }
}
