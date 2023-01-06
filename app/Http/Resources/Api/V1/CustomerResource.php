<?php

namespace App\Http\Resources\Api\V1;

use App\Http\Resources\Api\V1\InvoiceResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'name'          => $this->name, 
            'email'         => $this->email,
            'address'       => $this->address, 
            'city'          => $this->city, 
            'state'         => $this->state, 
            'country'        => $this->country,
            'invoices'      => InvoiceResource::collection($this->whenLoaded('invoices'))
        ];
    }
}
