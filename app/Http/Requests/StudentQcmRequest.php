<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentQcmRequest extends FormRequest
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
        foreach ($this->request as $key => $value) {
            if(strpos($key,'answer') !== false ){
                $rules[$key] = 'in:yes,no';
            }
        }

        return $rules;
    }

    public function messages()
    {
        foreach ($this->request as $key => $value) {
            if(strpos($key,'answer') !== false ){
                $messages[$key.'.in'] = 'Vous devez choisir une réponse';
            }
        }

        return $messages;
    }
}
