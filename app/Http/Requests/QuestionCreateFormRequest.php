<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionCreateFormRequest extends FormRequest
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
            "titulo" => "required|max:1000",
            "opcCorrecta" => "required|max:1000",
            "opc1" => "required|max:1000",
            "opc2" => "required|max:1000",
            "opc3" => "required|max:1000",
            "factor" => "integer",
        ];
    }
}
