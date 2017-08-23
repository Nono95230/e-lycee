<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChoiceRequest extends FormRequest{

    /* Determine if the user is authorized to make this request.
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
            'question'    => 'bail|required|string'
        ];
    }

    public function messages()
    {
        return [
            'question.required'  => 'Vous devez définir la question',
            'question.string'    => 'La question doit être une phrase',

        ];
    }

}