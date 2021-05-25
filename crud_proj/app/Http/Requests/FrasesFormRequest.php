<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FrasesFormRequest extends FormRequest
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
            "english" => "required|min:3", 
            "portuguese" => "required|min:3"
        ];
    }

    public function messages()
    {
        /*
        return [
            "english.required" => "O campo :attribute eh obrigatorio.", 
            "english.min" => "O campo :attribute deve possuir 3 caracteres ou mais.", 
            "portuguese.required" => "O campo :attribute eh obrigatorio.", 
            "portuguese.min" => "O campo :attribute deve possuir 3 caracteres ou mais.", 
        ];
        */

        return [
            "required" => "O campo :attribute eh obrigatorio.", 
            "min" => "O campo :attribute deve possuir 3 caracteres ou mais."
        ];
    }
}
