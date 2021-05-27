<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivrosFormRequest extends FormRequest
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
            "titulo" => "required|min:2", 
            "autor" => "required|min:2", 
            "paginas" => "required"
        ];
    }

    public function messages()
    {
        return [
            "required" => "O campo \":attribute\" é obrigatório", 
            "min" => "O campo \":attribute\" deve possui pelo menos dois caracteres"
        ];
    }
}
