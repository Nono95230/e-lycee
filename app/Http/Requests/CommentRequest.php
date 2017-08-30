<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'title'   => 'bail|required|string|min:5|max:130', 
            'content' => 'bail|required|string|min:10|max:300'
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
            'title.required'        => 'Vous devez écrire un titre',
            'title.string'          => 'Le titre doit être une phrase',
            'title.min'             => 'Le titre doit avoir minimum 5 caractères',
            'title.max'             => 'Le titre doit avoir maximum 130 caractères',
            'content.required'      => 'Vous devez écrire un commentaire',
            'content.string'        => 'Le commentaire doit être une phrase',
            'content.min'           => 'Le commentaire doit avoir minimum 10 caractères',
            'content.max'           => 'Le commentaire doit avoir maximum 300 caractères'
        ];
    }

}
