<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateInvoiceRequest extends FormRequest
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
        $method = $this->method();

        if ( $method === 'PUT' ) {
            return [
                'customer_id'  => ['required', 'integer'],
                'status'        => ['required', 'string', Rule::in(['B', 'P', 'V', 'b', 'p', 'v'])],
                'quantity'      => ['required', 'integer'],
                'amount'        => ['required', 'numeric'],   
                'billedDate'   => ['required', 'date'],
                'payedDate'    => ['required', 'date']
            ];
        }

        
        return [
            'customer_id'  => ['sometimes', 'required', 'integer'],
            'status'        => ['sometimes', 'required', 'string', Rule::in(['B', 'P', 'V', 'b', 'p', 'v'])],
            'quantity'      => ['sometimes', 'required', 'integer'],
            'amount'        => ['sometimes', 'required', 'numeric'],   
            'billedDate'   => ['sometimes', 'required', 'date'],
            'payedDate'    => ['sometimes', 'required', 'date']
        ];
    }
}
