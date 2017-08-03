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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'bail|required|unique:posts|string', // bail stop au premier fail
            'content' => 'bail|required|min:100',
            'abstract' => 'bail|required|min:50|max:200',
            'status' => 'in:published,unpublished',
            'url_thumbnail' => 'bail|image|max:'.env('MAX_FILE_UPLOAD') 
        
        ];
    }
}
