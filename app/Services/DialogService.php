<?php

namespace App\Services;

use App\Exceptions\ModelSaveException;
use App\Http\Requests\Api\Dialog\CreateRequest;
use App\Models\Dialog;
use App\Models\User;

/**
 * Сервис для работы с сущностью "Даилог"
 *
 * Class DialogService
 * @package App\Services
 */
class DialogService
{
    private Dialog $dialog;

    /**
     * DialogService constructor.
     * @param Dialog $dialog
     */
    public function __construct(Dialog $dialog)
    {
        $this->dialog = $dialog;
    }

    /**
     * Создание диалога
     *
     * @param CreateRequest $request
     * @return Dialog
     * @throws ModelSaveException
     */
    public function create(CreateRequest $request): Dialog
    {
        /** @var User $user */
        $user = $request->user();

        $dialog = new Dialog();
        $dialog->first_user_id = $user->id;
        $dialog->second_user_id = $request->user['id'];

        if (!$dialog->save()) {
            throw new ModelSaveException();
        }

        return $dialog;
    }
}
