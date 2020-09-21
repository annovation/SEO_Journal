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
        $rules = [];

        switch($this->method()){
            case 'GET':
            break;
            case 'POST':
            case 'PUT':
                $rules = [
                    "post_title"              => "required|max:100",
                    "short_description"       => "required|max:250",
                    "description"             => "required|max:4000",
                    "category_id"             => "required|max:20"
                ];
            break;
            case 'PATCH':
            break;
            case 'DELETE':
            break;
        }

        return $rules;
    }
}
