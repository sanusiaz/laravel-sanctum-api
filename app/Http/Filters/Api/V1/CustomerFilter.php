<?php

namespace App\Http\Filters\Api\V1;
use Illuminate\Http\Request;
use App\Http\Filters\Api\ApiFilter;


class CustomerFilter extends ApiFilter 
{
    protected $safeParms = [        
        'name'          => ['eq', 'neq'],
        'email'          => ['eq', 'neq'],
        'address'          => ['eq', 'neq'],
        'city'          => ['eq', 'neq'],
        'state'          => ['eq', 'neq'],
        'country'          => ['eq', 'neq']
    ];

    protected $operatorMap = [
        'eq'    => '=',
        'neq'   => '!=',
        // 'lt'    => '<',
        // 'gt'    => '>',
        // 'lte'   => '<=',
        // 'gte'   => '>='
    ];

}


