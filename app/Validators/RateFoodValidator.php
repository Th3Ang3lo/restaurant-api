<?php

namespace App\Validators;

use App\Exceptions\BadRequestException;

class RateFoodValidator
{
    const RULES = [
        'id' => 'required|integer',
        'note' => 'required|integer|min:1|max:5'
    ];

    const MESSAGES = [
        'id.required' => 'O id é obrigatório.',
        'id.integer' => 'O ID deve ser um valor numérico.',
        'note.required' => 'O id é obrigatório.',
        'note.integer' => 'A nota deve ser um valor numérico.',
        'note.min' => 'O mínimo é de 1 para a avaliação.',
        'note.max' => 'O máximo é de 5 para a avaliação.',
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
