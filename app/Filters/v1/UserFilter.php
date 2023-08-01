<?php

namespace App\Filters\v1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class UserFilter extends ApiFilter
{
    protected $parameters = [
        'id' => ['eq', 'gt', 'lt', 'lte', 'gte'],
        'username' => ['eq'],
        'email' => ['eq'],
        'completed_tasks' => ['eq', 'gt', 'lt', 'lte', 'gte']
    ];

    protected $columnMap = [
        'completedTasks' => 'completed_tasks'
    ];
}