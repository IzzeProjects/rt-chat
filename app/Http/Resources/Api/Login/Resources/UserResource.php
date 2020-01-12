<?php

namespace App\Http\Resources\Api\Login\Resources;

use App\Http\Resources\ArrayJsonResource;
use App\Models\User;

/**
 * Class UserResource
 * @package App\Http\Resources\Api\Login\Resources
 *
 * @mixin User
 */
class UserResource extends ArrayJsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}
