<?php

namespace App\Repositories\Foods;

interface IFoodRepository
{
    public function findAll();
    public function findFeaturedFoods();
}
