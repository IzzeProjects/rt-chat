<?php

namespace App\Http\Resources\Dialog\Create;

use App\Http\Resources\Entities\DialogResource;
use App\Models\Dialog;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class Response
 * @package App\Http\Resources\Dialog\Create
 *
 * @mixin Dialog
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
        return DialogResource::make($this)->toArray($request);
    }
}
