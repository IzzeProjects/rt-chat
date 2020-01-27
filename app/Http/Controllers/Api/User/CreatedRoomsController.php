<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\User\CreatedRooms\Response;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Событие получения всех комнат созданных пользователем
 *
 * Class CreatedRoomsController
 * @package App\Http\Controllers\Api\User
 */
class CreatedRoomsController extends ApiController
{
    /**
     * CreatedRoomsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        /** @var User $user */
        $user = $request->user();
        return $this->data(Response::collection(
            $user->createdRooms()
                ->with(['creator'])
                ->get()
        ));
    }
}
