<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class VueloRequest extends FormRequest
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
            'codigo' => 'required|regex:/^[\w-]*$/i',
            'origen' => 'required|different:destino|string|min:5|max:50',
            'destino' => 'required|different:origen|string|min:5|max:50',
            'fecha' => 'required|date|after:tomorrow',
            'hora' => 'required',
            'matricula' => 'regex:/^[\d]{6}-{1}[a-zA-Z]{2}$/i',
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
