<?php

namespace App\Http\Resources\User\CreatedRooms;

use App\Http\Resources\Entities\RoomResource;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class Response
 * @package App\Http\Resources\User\CreatedRooms
 *
 * @mixin Room
 */
class Response extends JsonResource
{
    /**
     * Формирование ответа
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return RoomResource::make($this)->toArray($request);
    }
}
