<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PostRequest extends FormRequest
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
        switch($this->method())
        {
            case 'POST':
            {
                return [
                    'title' => 'bail|required|string|unique:posts,title,'.$this->post_id, 
                    'content' => 'bail|required|min:100',
                    'abstract' => 'bail|required|min:50|max:200',
                    'url_thumbnail' => 'bail|required|image|max:'.env('MAX_FILE_UPLOAD') 
                ];
            }
            case 'PATCH':
            case 'PUT':
            {
                return [
                    'title' => 'bail|required|string|unique:posts,title,'.$this->post_id, 
                    'content' => 'bail|required|min:100',
                    'abstract' => 'bail|required|min:50|max:200',
                    'url_thumbnail' => 'bail|image|max:'.env('MAX_FILE_UPLOAD') 
                ];
            }
            default:break;
        }
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Vous devez définir un titre',
            'title.string' => 'Le titre doit être une phrase',
            'title.unique' => 'Ce titre existe déjà dans un autre article',
            'content.required'  => 'Votre article doit avoir un contenu',
            'content.min'  => 'Le contenu doit avoir au moins 100 caractères',
            'abstract.required'  => 'Votre article doit avoir un résumé',
            'abstract.min'  => 'Le résumé doit avoir au moins 50 caractères',
            'abstract.max'  => 'Le résumé ne doit pas avoir plus de 200 caractères',
            'url_thumbnail.required' => 'Une image est requise',
            'url_thumbnail.image' => 'Le fichier choisi n\'est pas une image',
            'url_thumbnail.max' => 'Le poids maximum de votre fichier doit être inférieure à '.(env('MAX_FILE_UPLOAD')/1024).' Mo',
        ];
    }
}
