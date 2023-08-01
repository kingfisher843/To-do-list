<?php

namespace App\Filters\v1;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class TaskFilter extends ApiFilter
{
    protected $parameters = [
        'id' => ['eq', 'gt', 'lt', 'lte', 'gte'],
        'name' => ['eq'],
        'description' => ['eq'],
        'completed' => ['eq'],
        'userId' => ['eq', 'gt', 'lt', 'lte', 'gte']
    ];

    protected $columnMap = [
        'userId' => 'user_id'
    ];
}