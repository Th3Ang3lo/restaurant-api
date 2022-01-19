<?php

namespace App\Repositories\Rate;

interface IRateFoodRepository
{
    public function createOrUpdate($userID, $foodID, $note);
}
