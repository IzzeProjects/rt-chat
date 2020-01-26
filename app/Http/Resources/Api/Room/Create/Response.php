<?php

namespace App\Http\Resources\Api\Room\Create;

use App\Http\Resources\Api\Resources\UserResource;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class Response
 * @package App\Http\Resources\Api\Room\Create
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
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created' => $this->created_at,
            'updateAt' => $this->update_at,
            'createdBy' => UserResource::make($this->user)
        ];
    }
}
