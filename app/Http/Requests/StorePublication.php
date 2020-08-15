<?php

namespace App\Http\Requests;
use Lang;
use Illuminate\Foundation\Http\FormRequest;

class StorePublication extends FormRequest
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
            'title' => 'required',
            'content' => 'required'
        ];
       
    }

    public function messages(){
        return [
            'title.required' => Lang::get('errors.publications_title_required'),
            'content.required' => Lang::get('errors.publications_content_required'),
        ];
    }
}
