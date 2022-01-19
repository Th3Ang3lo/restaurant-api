<?php

namespace App\Validators;

use App\Exceptions\BadRequestException;

class LoginValidator
{
    const RULES = [
        'email' => 'required|email',
        'password' => 'required|min:6|max:255'
    ];

    const MESSAGES = [
        'email.required' => 'Campo e-mail obrigatório.',
        'email.email' => 'E-mail inválido.',
        'password.required' => 'Campo senha obrigatório.',
        'password.min' => 'A senha deve ser no mínimo 6 caracteres.',
        'password.max' => 'A senha deve ser no máximo 255 caracteres.'
    ];

    /**
     * @throws BadRequestException
     */
    public static function validate(array $data): void
    {
        $validator = validator($data, self::RULES, self::MESSAGES);

        dispatchError($validator);
    }
}
