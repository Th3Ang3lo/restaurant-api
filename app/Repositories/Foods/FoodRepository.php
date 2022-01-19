<?php

namespace App\Repositories\Foods;

use App\Models\Food;

use App\Repositories\Foods\IFoodRepository;
use Illuminate\Support\Facades\DB;

class FoodRepository implements IFoodRepository
{
    public function findAll()
    {
        return DB::select('
            SELECT *,
            (SELECT COUNT(*) FROM ratings WHERE ratings.id = foods.id) as rating_total,
            (SELECT SUM(note) FROM ratings WHERE ratings.id = foods.id) as rating_note_total
            FROM foods;
        ');
    }
}
