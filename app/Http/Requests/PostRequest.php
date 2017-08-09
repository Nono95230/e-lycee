<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

//use Illuminate\Validation\Rule;

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
        return [
            //'title' => 'bail|required|string|'.Rule::unique('posts')->ignore($this->post_id),
            'title' => 'bail|required|string|unique:posts,title,'.$this->post_id, 
            'content' => 'bail|required|min:100',
            'abstract' => 'bail|required|min:50|max:200',
            'status' => 'in:published,unpublished',
            //'url_thumbnail' => 'bail|required|image|max:'.env('MAX_FILE_UPLOAD') 
        
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
            'title.required' => 'Vous devez définir un titre',
            'title.string' => 'Le titre doit être une phrase',
            'title.unique' => 'Ce titre existe déjà dans un autre article',
            'content.required'  => 'Votre article doit avoir un contenu',
            'content.min'  => 'Le contenu doit avoir au moins 100 caractères',
            'abstract.required'  => 'Votre article doit avoir un résumé',
            'abstract.min'  => 'Le résumé doit avoir au moins 50 caractères',
            'abstract.max'  => 'Le résumé ne doit pas avoir plus de 200 caractères',
        ];
    }
}
