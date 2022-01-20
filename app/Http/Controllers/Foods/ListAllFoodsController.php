<?php

namespace App\Http\Controllers\Foods;

use App\Http\Controllers\Controller;
use App\Services\Foods\ListAllFoodsService;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ListAllFoodsController extends Controller
{
    public function handle(Request $request, Response $response): Response
    {
        try {
            $listAllFoodsService = new ListAllFoodsService();
            $listAllFoods = $listAllFoodsService->execute();

            return ok($listAllFoods);
        } catch (\Exception $error) {
            dd($error);
            return error($error);
        }
    }
}
