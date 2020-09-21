<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                    "category_name"              => "required|max:50"
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
