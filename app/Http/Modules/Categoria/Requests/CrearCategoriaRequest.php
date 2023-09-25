<?php

namespace App\Http\Modules\Categoria\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CrearCategoriaRequest extends FormRequest
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
            'nombre'       =>   'string|required|unique:categorias,nombre',
            'descripcion'  =>   'string|required'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw(new HttpResponseException(response()->json($validator->errors(), 422)));
    }
}
