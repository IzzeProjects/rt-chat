<?php

namespace App\Http\Controllers\Api\User;

use App\DataProviders\UserDataProvider;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\User\UsersRequest;
use App\Http\Resources\Entities\UserResource;
use Illuminate\Http\JsonResponse;

/**
 * Получение всех пользователей
 *
 * Class UsersController
 * @package App\Http\Controllers\Api\User
 */
class UsersController extends ApiController
{
    private UserDataProvider $dataProvider;

    /**
     * UsersController constructor.
     * @param UserDataProvider $dataProvider
     */
    public function __construct(UserDataProvider $dataProvider)
    {
        $this->dataProvider = $dataProvider;
    }

    /**
     * @param UsersRequest $request
     * @return JsonResponse
     */
    public function __invoke(UsersRequest $request): JsonResponse
    {
        return $this->data(UserResource::collection(
            $this->dataProvider->getUsers($request)
        ));
    }
}
