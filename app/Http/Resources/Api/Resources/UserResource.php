<?php

namespace App\Http\Resources\Api\Resources;

use App\Http\Resources\ArrayJsonResource;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class UserResource
 * @package App\Http\Resources\Api\Resources
 *
 * @mixin User
 */
class UserResource extends ArrayJsonResource
{
    /**
     * Формирование ответа
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}
