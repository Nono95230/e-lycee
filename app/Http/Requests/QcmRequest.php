<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QcmRequest extends FormRequest{

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
            'title'       => 'bail|required|string|min:5|max:50', 
            'class_level' => 'in:premiere,terminale',
            'nb_question'   => 'bail|required|numeric|min:5|max:30'
        ];
    }
    
    public function messages()
    {
        return [
            'title.required'        => 'Vous devez définir un titre',
            'title.string'          => 'Le titre doit être une phrase',
            'title.min'             => 'Le titre doit avoir minimum 5 caractères',
            'title.max'             => 'Le titre doit avoir maximum 50 caractères',
            'nb_question.required' => 'Ce champs ne peut être vide',
            'nb_question.numeric'  => 'Ce champs doit être un entier numérique',
            'nb_question.min'      => 'Le minimum de question doit être de 5',
            'nb_question.max'      => 'Le maximum de question doit être de 30',
            'class_level.in'        => 'Veuillez choisir le bon niveau'
        ];
    }
}