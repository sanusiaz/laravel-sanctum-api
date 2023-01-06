<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
        if ( request()->method() === 'PUT' )
        {
            return [
                'name'          => ['required', 'max:255', 'string'], 
                'address'       => ['required', 'max:255'], 
                'city'          => ['required', 'string', 'max:255'], 
                'state'         => ['required', 'max:255', 'string'], 
                'country'       => ['required', 'max:255', 'string']
            ];
        }

        return [
            'name'          => ['sometimes', 'max:255', 'string'], 
            'address'       => ['sometimes', 'max:255'], 
            'city'          => ['sometimes', 'string', 'max:255'], 
            'state'         => ['sometimes', 'max:255', 'string'], 
            'country'       => ['sometimes', 'max:255', 'string']
        ];
    }
}
