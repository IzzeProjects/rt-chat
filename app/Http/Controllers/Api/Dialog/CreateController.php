<?php

namespace App\Http\Controllers\Api\Dialog;

use App\DataProviders\DialogDataProvider;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\Dialog\CreateRequest;
use App\Http\Resources\Dialog\Create\Response;
use App\Models\User;
use App\Services\DialogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as HttpResponse;

/**
 * Событие создания диалога
 *
 * Class CreateController
 * @package App\Http\Controllers\Api\Dialog
 */
class CreateController extends ApiController
{
    private DialogService $service;

    private DialogDataProvider $dataProvider;

    private User $user;

    /**
     * CreateController constructor.
     * @param DialogService $service
     * @param DialogDataProvider $dataProvider
     * @param User $user
     */
    public function __construct(DialogService $service, DialogDataProvider $dataProvider, User $user)
    {
        $this->service = $service;
        $this->dataProvider = $dataProvider;
        $this->user = $user;
    }

    /**
     * @param CreateRequest $request
     * @return JsonResponse
     */
    public function __invoke(CreateRequest $request): JsonResponse
    {
        /** @var User $user */
        $user = $request->user();

        $dialog = $this->dataProvider->getDialogByMembers(
            $user,
            $this->user->find($request->user['id'])
        );

        if (!empty($dialog)) {
            return $this->data(Response::make($dialog), HttpResponse::HTTP_ACCEPTED);
        }

        try {
            $dialog = $this->service->create($request);
        } catch (\Exception $exception) {
            return $this->errors([
                [
                    'source' => 'Диалог',
                    'title' => $exception->getMessage()
                ],
            ], HttpResponse::HTTP_BAD_REQUEST);
        }

        return $this->data(Response::make($dialog), HttpResponse::HTTP_CREATED);
    }
}
