<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'status',
        'quantity',
        'amount',
        'billed_date',
        'payed_date',
        'invoice_ref'
    ];


    public function customer() {
        return $this->belongsTo(Customer::class);
    }
}
