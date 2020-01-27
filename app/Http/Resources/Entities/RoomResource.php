<?php

namespace App\Http\Resources\Entities;

use App\Http\Resources\ArrayJsonResource;
use App\Models\Room;
use Illuminate\Http\Request;

/**
 * Class RoomResource
 * @package App\Http\Resources\Entities
 *
 * @mixin Room
 */
class RoomResource extends ArrayJsonResource
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
            'created' => $this->created_at,
            'updateAt' => $this->updated_at,
            'createdBy' => UserResource::make($this->creator)
        ];
    }
}
