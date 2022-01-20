<?php

namespace App\Services\Foods;

use App\Repositories\Foods\FoodRepository;

class ListFeaturedFoodsService
{
    private FoodRepository  $foodRepository;

    public function __construct()
    {
        $this->foodRepository = new FoodRepository();
    }

    public function execute(): array
    {
        return array_map(function($food){
            return fixRatingValues($food);
        }, $this->foodRepository->findFeaturedFoods());
    }
}
