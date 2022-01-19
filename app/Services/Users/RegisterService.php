<?php

namespace App\Services\Users;

use App\Exceptions\BadRequestException;
use App\Exceptions\ConflictException;
use App\Repositories\Users\UsersRepository;
use App\Validators\RegisterValidator;
use Illuminate\Support\Facades\Hash;

class RegisterService
{
    private UsersRepository $usersRepository;

    public function __construct()
    {
        $this->usersRepository = new UsersRepository();
    }

    /**
     * @throws BadRequestException
     * @throws ConflictException
     * @returns array
     */
    public function execute($name, $email, $password): array
    {
        $validator = [
            'name' => $name,
            'email' => $email,
            'password' => $password
        ];

        RegisterValidator::validate($validator);

        $data = null;
        try {
            $data = $this->usersRepository->create($name, $email, Hash::make($password));
            // TODO: SEND CONFIRMATION EMAIL
        } catch (\Exception $error) {
            throw new ConflictException('E-mail indisponível.');
        }

        $token = auth()->login($data);

        return array_merge($data->toArray(), [
            'token' => $token
        ]);
    }
}
