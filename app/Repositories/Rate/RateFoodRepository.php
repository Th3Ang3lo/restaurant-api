<?php

namespace App\Repositories\Rate;

use App\Models\Rate;

class RateFoodRepository implements IRateFoodRepository
{
    public function createOrUpdate($userID, $foodID, $note)
    {
        $rate = Rate::where('userID', $userID)->where('foodID', $foodID)->first();

        if($rate) {
            $rate->note = $note;
            $rate->save();
        } else {
            Rate::create([
               'userID' => $userID,
               'foodID' => $foodID,
               'note' => $note
           ]);
        }
    }
}
