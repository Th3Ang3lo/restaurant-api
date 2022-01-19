<?php

namespace App\Repositories\Users;

use App\Models\User;
use Illuminate\Support\Facades\DB;

use App\Repositories\Users\IUsersRepository;

class UsersRepository implements IUsersRepository
{
    public function create($name, $email, $password)
    {
        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'verified' => false
        ]);
    }

    public function findByEmail($email){
        return User::where('email', $email)->first();
    }

    public function findById($userID){
        return User::where('id', $userID)->first();
    }
}
