<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;

use App\Services\Users\LoginService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    public function __construct()
    {
        //
    }

    public function handle(Request $request, Response $response): Response
    {
        try {
            $email = $request->get('email');
            $password = $request->get('password');

            $loginService = new LoginService();
            $login = $loginService->execute($email, $password);

            return ok($login);
        } catch (\Exception $error) {
            return error($error);
        }
    }
}
