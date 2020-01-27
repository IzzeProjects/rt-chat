<?php

namespace App\Http\Controllers\Api\Room;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\Room\CreateRequest;
use App\Http\Resources\Room\Create\Response;
use App\Services\RoomService;
use Illuminate\Http\JsonResponse;

/**
 * Событие создания комнаты
 *
 * Class CreateController
 * @package App\Http\Controllers\Api\Room
 */
class CreateController extends ApiController
{
    private RoomService $service;

    /**
     * CreateController constructor.
     * @param RoomService $service
     */
    public function __construct(RoomService $service)
    {
        $this->service = $service;
    }

    /**
     * @param CreateRequest $request
     * @return JsonResponse
     */
    public function __invoke(CreateRequest $request): JsonResponse
    {
        try {
            $room = $this->service->create($request);
        } catch (\Exception $exception) {
            return $this->errors([
                [
                    'source' => 'Комната',
                    'title' => $exception->getMessage()
                ]
            ]);
        }

        return $this->data(Response::make($room));
    }
}
