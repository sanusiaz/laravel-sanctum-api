<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        // select random users id
        // this is just for testing purposes for the api to work

        return [
            'name'          => ['required', 'max:255', 'string', 'unique:products,name'],
            'slug'          => ['required', 'max:255', 'unique:products,slug'],
            'description'   => ['required'],
            'price'         => ['integer', 'required'],
            'image_path'    => ['sometimes', 'mimes:png,jpg,jpeg,svg,gif', 'max:5000'],
            'user_id'       => ['required', 'integer']
        ];
    }
}
