<?php

namespace App\Repositories\Users;

interface IUsersRepository {
    public function create($name, $email, $password);
    public function findByEmail($email);
    public function findById($id);
}
