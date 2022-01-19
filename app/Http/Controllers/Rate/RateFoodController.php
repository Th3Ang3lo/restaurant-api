<?php

namespace App\Http\Controllers\Rate;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Services\Rate\RateFoodService;

class RateFoodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function handle(Request $request, $foodID, $note): Response
    {
        try {
            $userID = auth()->user()->getAuthIdentifier();

            $rateFoodService = new RateFoodService();
            $rateFoodService->execute($userID, $foodID, $note);

            return okNoContent();
        } catch (\Exception $error) {
            return error($error);
        }
    }
}
