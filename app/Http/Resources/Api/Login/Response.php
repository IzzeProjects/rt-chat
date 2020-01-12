<?php

namespace App\Http\Resources\Api\Login;

use App\Http\Resources\Api\Login\Resources\UserResource;
use App\Http\Resources\ArrayJsonResource;
use App\Models\User;
use Illuminate\Support\Carbon;
use Tymon\JWTAuth\Payload;

/**
 * Class Response
 * @package App\Http\Resources\Api\Login
 *
 * @property-read string $token
 * @property-read Payload $payload
 * @property-read User $user
 */
class Response extends ArrayJsonResource
{
    /**
     * Формирование ответа
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'accessToken' => $this->token,
            'expiredAt' => Carbon::createFromTimestamp($this->payload['exp'])->format(DATE_ATOM),
            'tokenType' => 'Bearer',
            'user' => UserResource::make($this->user),
        ];
    }
}
