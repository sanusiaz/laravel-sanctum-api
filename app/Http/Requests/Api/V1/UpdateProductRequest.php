<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
        if ( request()->method() === 'PUT' ) {
            // update all request
            return [
                'name'          => ['required', 'max:255', 'string', 'unique:products,name'],
                'slug'          => ['required', 'max:255', 'unique:products,slug'],
                'description'   => ['required'],
                'price'         => ['integer', 'required'],
                'image_path'    => ['mimes:png,jpg,jpeg,svg,gif', 'max:5000', 'nullable'],
            ];
        }
        else {
            return [
                'name'          => ['sometimes', 'max:255', 'string'],
                'slug'          => ['sometimes', 'max:255'],
                'description'   => ['sometimes'],
                'price'         => ['integer', 'sometimes'],
                'image_path'    => ['sometimes', 'mimes:png,jpg,jpeg,svg,gif', 'max:5000'],
            ];
        }       
    }
}
