<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            //
            'email'       => 'required|email|min:10',
            'subject'     => 'required|max:100',
            'commentaire' => 'required|max:1000'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required'        => 'Ce champs ne peut être vide',
            'email.email'           => 'Ce champs doit être un email valide',
            'email.min'             => 'Ce champs doit avoir au moins 10 caractères',
            'subject.required'      => 'Ce champs ne peut être vide',
            'subject.max'           => 'Ce champs ne doit dépasser 100 caractères',
            'commentaire.required'  => 'Ce champs ne peut être vide',
            'commentaire.max'       => 'Ce champs ne doit dépasser 1000 caractères'
        ];
    }
}
