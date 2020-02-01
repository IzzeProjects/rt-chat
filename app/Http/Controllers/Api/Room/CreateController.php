<?php

namespace App\Http\Controllers\Api\Room;

use App\DataProviders\RoomDataProvider;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\Room\CreateRequest;
use App\Http\Resources\Room\Create\Response;
use App\Models\User;
use App\Services\RoomService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as HttpResponse;

/**
 * Событие создания комнаты
 *
 * Class CreateController
 * @package App\Http\Controllers\Api\Room
 */
class CreateController extends ApiController
{
    private RoomService $service;

    private RoomDataProvider $dataProvider;

    /**
     * CreateController constructor.
     * @param RoomService $service
     * @param RoomDataProvider $dataProvider
     */
    public function __construct(RoomService $service, RoomDataProvider $dataProvider)
    {
        $this->service = $service;
        $this->dataProvider = $dataProvider;
    }

    /**
     * @param CreateRequest $request
     * @return JsonResponse
     */
    public function __invoke(CreateRequest $request): JsonResponse
    {
        /** @var User $user */
        $user = $request->user();

        $room = $this->dataProvider->getByCreatorAndName($user, $request->name);

        if (!empty($room)) {
            return $this->errors([
                [
                    'source' => 'Комната',
                    'title' => 'Комната с именем \'' . $request->name . '\' уже существует'
                ],
            ], HttpResponse::HTTP_CONFLICT);
        }

        try {
            $room = $this->service->create($request);
        } catch (\Exception $exception) {
            return $this->errors([
                [
                    'source' => 'Комната',
                    'title' => $exception->getMessage()
                ],
            ], HttpResponse::HTTP_BAD_REQUEST);
        }

        return $this->data(Response::make($room));
    }
}
