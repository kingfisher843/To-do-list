<?php

namespace App\Repostories\User;

interface UserInterface {

    public function getAll();

    public function find($id);

    public function store(array $userData);

    public function update($id, array $newUserData);

    public function delete($id);
}