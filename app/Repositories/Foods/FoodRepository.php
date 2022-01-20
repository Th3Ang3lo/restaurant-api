<?php

namespace App\Repositories\Foods;

use App\Models\Food;

use App\Repositories\Foods\IFoodRepository;
use Illuminate\Support\Facades\DB;

class FoodRepository implements IFoodRepository
{
    private string $findAllSQL = '
        SELECT *,
        (SELECT COUNT(*) FROM ratings WHERE ratings.id = foods.id) as rating_total,
        (SELECT SUM(note) FROM ratings WHERE ratings.id = foods.id) as rating_note_total
        FROM foods
    ';

    public function findAll(): array
    {
        return DB::select($this->findAllSQL);
    }

    public function findFeaturedFoods()
    {
        return DB::select($this->findAllSQL . ' ORDER BY rating_note_total DESC LIMIT 5;');
    }
}
