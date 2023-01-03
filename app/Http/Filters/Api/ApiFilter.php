<?php

namespace App\Http\Filters\Api;
use Illuminate\Http\Request;
use Illuminate\Http\Response;



class ApiFilter 
{
    protected $safeParms = [];

    protected $operatorMap = [];

    protected $columnMap = [];

    public function transform(Request $request)
    {
        $eloQuery = [];      
            
        foreach ( $this->safeParms as $parm => $operators ) {
            $query = $request->query($parm);
            
            if ( !isset($query) ) {
                continue;
            }

            foreach ( $operators as $operator ) {
                if ( isset($query[$operator]) ) {
                    $column = $this->columnMap[$parm] ?? $parm;                    
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }

        return $eloQuery;
    } 
}


