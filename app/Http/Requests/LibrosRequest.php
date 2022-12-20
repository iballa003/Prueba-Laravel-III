<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibrosRequest extends FormRequest
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
            'titulo' => 'required|string|min:2|max:30',
            'autor' => 'required|string|min:2|max:30',
            'paginas' => 'required|string|min:2|max:30',
            'genero' => 'required|string|min:2|max:30',
            'codigo' => 'regex:/[\d]{4}-{1}[a-zA-Z]{1}/i',
            'f_publicacion' => 'required|date_format:d-m-Y',
        ];
    }
    public function messages()
    {
        return [
            'codigo.regex' =>
                'El campo :attribute tiene que empezar por 4 digitos seguidos de un guión y una letra.',
            'f_publicacion.date_format' =>
                'El campo :attribute tiene que ser formato dd-mm-YYYY',
        ];
    }
}
