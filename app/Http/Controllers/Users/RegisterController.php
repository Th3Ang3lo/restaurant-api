<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;

use App\Services\Users\RegisterService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RegisterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function handle(Request $request, Response $response): Response
    {
        try {
            $name = $request->get('name');
            $email = $request->get('email');
            $password = $request->get('password');

            $registerService = new RegisterService();
            $register = $registerService->execute($name, $email, $password);

            return ok($register);
        } catch (\Exception $error) {
            return error($error);
        }
    }
}
