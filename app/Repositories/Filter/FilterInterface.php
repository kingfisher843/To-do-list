<?php
namespace App\Repositories\Filter;

use App\Models\Filter;

interface FilterInterface {

    public function getAll();

    public function find($id);

    public function store(Filter $filter, $user);

    public function update(Filter $filter, $newData);

    public function destroy($id);
}
