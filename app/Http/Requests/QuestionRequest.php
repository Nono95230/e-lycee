<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest{

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
        foreach ($this->request as $key => $value) {
            if($key !== '_token'  && $key !== '_method' ){
                if (strpos($key,'content') !== false ) {
                    $rules[$key] = 'bail|required|string|max:160';
                }
                if(strpos($key,'answer') !== false ){
                    $rules[$key] = 'in:yes,no';
                }
            }
        }

        return $rules;
    }

    public function messages()
    {
        foreach ($this->request as $key => $value) {
            if($key !== '_token' && $key !== '_method'){
                if (strpos($key,'content') !== false ) {
                    $messages[$key.'.required'] = 'Vous devez définir cette question';
                    $messages[$key.'.string'] = 'La question doit être une phrase';
                    $messages[$key.'.max'] = 'La question ne doit pas être supérieure à 160 caractères';
                }
                if(strpos($key,'answer') !== false ){
                    $messages[$key.'.in'] = 'Vous devez choisir une réponse';
                }
            }
        }

        return $messages;
    }

}