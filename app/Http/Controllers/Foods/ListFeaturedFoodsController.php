<?php

namespace App\Http\Controllers\Foods;

use App\Http\Controllers\Controller;
use App\Services\Foods\ListAllFoodsService;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ListFeaturedFoodsController extends Controller
{
    public function handle(Request $request, Response $response): Response
    {
        try {
            $listFeaturedFoodsService = new ListAllFoodsService();
            $listFeaturedFoods = $listFeaturedFoodsService->execute();

            return ok($listFeaturedFoods);
        } catch (\Exception $error) {
            return error($error);
        }
    }
}

