<?php

namespace App\Http\Controllers\Api\Dialog;

use App\DataProviders\UserDataProvider;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\Dialog\UsersRequest;
use App\Http\Resources\Entities\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;

/**
 * Событие создания диалога
 *
 * Class UsersController
 * @package App\Http\Controllers\Api\Dialog
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
        /** @var User $user */
        $user = $request->user();

        return $this->data(
            UserResource::collection(
                $this->dataProvider->getUsersByEmailExceptGivenUser($request->email, $user)
            )
        );
    }
}
