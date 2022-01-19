<?php

namespace App\Services\Foods;

use App\Repositories\Foods\FoodRepository;

class ListAllFoodsService
{
    private FoodRepository  $foodRepository;

    public function __construct()
    {
        $this->foodRepository = new FoodRepository();
    }

    public function execute(): array
    {
        return array_map(function($food){
            $food->rating_note_total = intval($food->rating_note_total);

            $rating_note_total = $food->rating_note_total;
            $rating_total = $food->rating_total;

            $isMoreThanZero = ($rating_note_total > 0 && $rating_total > 0);
            $food->rating_media =  $isMoreThanZero ? ($rating_note_total / $rating_total) : 0;
            $food->rating_media = intval($food->rating_media);

            return $food;
        }, $this->foodRepository->findAll());
    }
}
