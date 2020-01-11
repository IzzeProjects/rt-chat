<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response as HttpResponse;

/**
 * Авторизация через JWT
 *
 * Class LoginController
 * @package App\Http\Controllers\Api\Auth
 */
class LoginController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        dd($request->all());
        $credentials = $request->only('email', 'password');
        dd(1);
        $token = Auth::attempt($credentials);

        if (!$token) {
            return new JsonResponse(['errors' => 'Unauthorized'], HttpResponse::HTTP_UNAUTHORIZED);
        }

        return new JsonResponse([
            'token' => $token
        ]);
    }
}
