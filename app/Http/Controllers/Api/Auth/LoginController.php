<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Resources\Api\Auth\Login\Response;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\JWT;
use Tymon\JWTAuth\Token;

/**
 * Авторизация через JWT
 *
 * Class LoginController
 * @package App\Http\Controllers\Api\Auth
 */
class LoginController extends ApiController
{
    private JWT $jwt;

    /**
     * LoginController constructor.
     * @param JWT $jwt
     */
    public function __construct(JWT $jwt)
    {
        $this->jwt = $jwt;
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     * @throws \Tymon\JWTAuth\Exceptions\TokenBlacklistedException
     */
    public function __invoke(LoginRequest $request): JsonResponse
    {
        /** @var User $user */
        $user = User::query()
            ->where('email', $request->email)
            ->first();

        if (is_null($user)) {
            return $this->errors([['source' => 'Пользователь', 'title' => 'Пользователь не найден']], HttpResponse::HTTP_NOT_FOUND);
        }

        if (!Hash::check($request->password, $user->password)) {
            return $this->errors([['source' => 'Пользователь', 'title' => 'Не верный логин или пароль']], HttpResponse::HTTP_UNAUTHORIZED);
        }

        $token = $this->jwt->fromUser($user);

        $payload = $this->jwt->manager()->decode(new Token($token));

//        (new \Ahc\Jwt\JWT('RC9mLbxcoVZTbRq6lXQvJbfbGDBfABHAr9xJ0EmnFwlQyodvwlj4ZVRmCtBveIaC', 'HS256', 3600, 120))->decode($token);

        return $this->data(Response::make([
            'token' => $token,
            'payload' => $payload,
            'user' => $user,
        ]));
    }
}
