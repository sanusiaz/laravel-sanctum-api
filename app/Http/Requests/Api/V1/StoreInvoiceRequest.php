<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreInvoiceRequest extends FormRequest
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
        return [
            'customer_id'  => ['required', 'integer'],
            'status'        => ['required', 'string', Rule::in(['B', 'P', 'V', 'b', 'p', 'v'])],
            'quantity'      => ['required', 'integer'],
            'amount'        => ['required', 'numeric'],   
            'billedDate'   => ['required', 'date_format:Y-m-d H:i:s'],
            'payedDate'    => ['required', 'date_format:Y-m-d H:i:s']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'billed_date' => $this->billedDate,
            'payed_date' => $this->payedDate
        ]);
    }
}
