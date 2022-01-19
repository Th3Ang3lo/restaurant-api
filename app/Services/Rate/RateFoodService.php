<?php

namespace App\Services\Rate;

use App\Repositories\Rate\RateFoodRepository;
use App\Validators\RateFoodValidator;

class RateFoodService
{
    private RateFoodRepository $rateFoodRepository;

    public function __construct()
    {
        $this->rateFoodRepository = new RateFoodRepository();
    }

    /**
     * @throws \App\Exceptions\BadRequestException
     */
    public function execute($userID, $foodID, $note): void
    {
        $data = [
            'id' => $foodID,
            'note' => $note
        ];

        RateFoodValidator::validate($data);

        $this->rateFoodRepository->createOrUpdate($userID, $foodID, $note);
    }
}
