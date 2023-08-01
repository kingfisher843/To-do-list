<?php

namespace App\Filters;

use Illuminate\Http\Request;


class ApiFilter 
{
    protected $parameters = [];

    protected $columnMap = [];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!='
    ];

    public function transform (Request $request) {

        $queryResponse = [];

        foreach ($this->parameters as $param => $operators){

            $query = $request->query($param);

            if (!isset($query)){
                continue;
            }

            //query with user_id column
            $column = $this->columnMap[$param] ?? $param;

            foreach ($operators as $operator){

                //check if operator is allowed for this parameter
                if (isset($query[$operator])){
                    $queryResponse [] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }
        return $queryResponse;
    }
}