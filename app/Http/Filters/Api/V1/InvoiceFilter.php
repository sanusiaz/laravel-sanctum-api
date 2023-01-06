<?php

namespace App\Http\Filters\Api\V1;
use Illuminate\Http\Request;
use App\Http\Filters\Api\ApiFilter;


class InvoiceFilter extends ApiFilter 
{

    protected $safeParms = [    
        'customer_id'   => ['eq', 'neq'],
        'status'        => ['eq', 'neq'],
        'quantity'      => ['eq', 'neq', 'gt', 'lt'],
        'amount'        => ['eq', 'neq', 'gt', 'lt'],
        'billedDate'    => ['eq', 'neq', 'gt', 'lt'],
        'payedDate'     => ['eq', 'neq', 'gt', 'lt'],
        'status'        => ['eq', 'neq']
    ];

    protected $columnMap = [
        'billedDate' => 'billed_date',
        'payedDate'  => 'payed_date'
    ];

    protected $operatorMap = [
        'eq'    => '=',
        'neq'   => '!=',
        'lt'    => '<',
        'gt'    => '>',
        'lte'   => '<=',
        'gte'   => '>='
    ];

}


