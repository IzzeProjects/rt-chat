<?php

namespace App\Http\Resources\Entities;

use App\Http\Resources\ArrayJsonResource;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class UserResource
 * @package App\Http\Resources\Entities
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
            'createdAt' => $this->created_at->format('c'),
        ];
    }
}
