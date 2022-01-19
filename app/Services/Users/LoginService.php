<?php

namespace App\Services\Users;

use App\Exceptions\BadRequestException;
use App\Exceptions\ConflictException;
use App\Repositories\Users\UsersRepository;
use App\Validators\LoginValidator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\UnauthorizedException;

class LoginService
{
    private UsersRepository $usersRepository;

    public function __construct()
    {
        $this->usersRepository = new UsersRepository();
    }

    /**
     * @throws BadRequestException
     */
    public function execute($email, $password)
    {
        $data = [
            'email' => $email,
            'password' => $password
        ];

        LoginValidator::validate($data);
        $token = auth()->attempt($data);

        if ($token) {
            $user = auth()->user()->toArray();
            return array_merge($user, [
                'token' => $token
            ]);
        }

        throw new UnauthorizedException('Usuário inexistente e/ou senha incorreta.');
    }
}
