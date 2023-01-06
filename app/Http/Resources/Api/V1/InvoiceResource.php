<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'status'        => $this->status,
            'quantity'      => $this->quantity,
            'amount'        => number_format($this->amount),
            'billedDate'    => $this->billed_date,
            'payedDate'     => $this->payed_date
        ];
    }
}
