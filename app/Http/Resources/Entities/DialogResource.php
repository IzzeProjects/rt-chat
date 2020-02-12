<?php

namespace App\Http\Resources\Entities;

use App\Http\Resources\ArrayJsonResource;
use App\Models\Dialog;
use Illuminate\Http\Request;

/**
 * Class DialogResource
 * @package App\Http\Resources\Entities
 *
 * @mixin Dialog
 */
class DialogResource extends ArrayJsonResource
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
            'firstUser' => UserResource::make($this->firstUser),
            'secondUser' => UserResource::make($this->secondUser),
            'created' => $this->created_at,
            'updateAt' => $this->updated_at,
        ];
    }
}
