<?php

namespace App\Http\Filters\Api\V1;
use Illuminate\Http\Request;
use App\Http\Filters\Api\ApiFilter;


class ProductFilter extends ApiFilter 
{
    protected $safeParms = [
        'name'          => ['eq', 'neq'],
        'id'            => ['eq', 'gt', 'lt', 'gte', 'lte'],
        'price'         => ['eq', 'gt', 'lt', 'gte', 'lte'],
        'image_path'    => ['eq'],
        'user_id'       => ['eq', 'neq', 'lt', 'gt', 'lte', 'gte']
    ];

    protected $operatorMap = [
        'eq'    => '=',
        'neq'   => '!=',
        'lt'    => '<',
        'gt'    => '>',
        'lte'   => '<=',
        'gte'   => '>='
    ];

    protected $columnMap = [
        'image_path'    => 'imagePath',
        'user_id'       => 'userId'
    ];

}


