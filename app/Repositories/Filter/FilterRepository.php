<?php

namespace App\Repositories\Filter;

use App\Repositories\Filter\FilterInterface;
use App\Models\Filter;


class FilterRepository implements FilterInterface
{
    protected $filter;

    public function __construct(Filter $filter)
    {
        $this->filter = $filter;
    }

    public function getAll()
    {
        return $this->filter
        ->get();
    }

    public function find($id)
    {
        return $this->filter->find($id);
    }

    public function store(Filter $filter, $user)
    {
        $filter->user_id = $user->id;
        $filter->save();
        return $filter;
    }

    public function update(Filter $filter, $newData)
    {
        if ($newData["show"]){
            $filter->show = $newData["show"];
        }
        if ($newData["order"]){
            $filter->order = $newData["order"];
        }
        
        $filter->save();
        return $filter;
    }

    public function destroy($id)
    {
        return $this->filter->findOrFail($id)->delete();
    }
}