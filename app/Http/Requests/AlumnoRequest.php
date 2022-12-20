<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class AlumnoRequest extends FormRequest
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
            'nombre' => 'required|string|min:2|max:30',
            'apellidos' => 'required|string|min:2|max:40',
            'email' => 'required|unique:alumnos|min:2|max:40',
            #Rule::unique('email')->ignore($id),
            'codigo' => 'regex:/[\d]{4}-{1}[a-zA-Z]{1}/i',
            'c_postal' => 'required',
            'f_nacimiento' => 'required|date_format:d-m-Y',
        ];
    }
    public function messages()
    {
        return [
            'codigo.regex' =>
                'El campo :attribute tiene que empezar por 4 digitos seguido de un guión y una letra.',
            'f_nacimiento.date_format' =>
                'El campo :attribute tiene que ser formato dd-mm-YYYY',
        ];
    }
}
