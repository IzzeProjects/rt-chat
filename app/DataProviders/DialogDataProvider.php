<?php

namespace App\DataProviders;

use App\Models\Dialog;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

/**
 * Получение данных сущности Dialog
 *
 * Class DialogDataProvider
 * @package App\DataProviders
 */
class DialogDataProvider
{
    private Dialog $dialog;

    /**
     * DialogDataProvider constructor.
     * @param Dialog $dialog
     */
    public function __construct(Dialog $dialog)
    {
        $this->dialog = $dialog;
    }

    /**
     * Полчение диалога по участникам
     *
     * @param User $first
     * @param User $second
     * @return Dialog|null
     */
    public function getDialogByMembers(User $first, User $second): ?Dialog
    {
        $builder = $this->dialog->query();
        $builder->where(function (Builder $query) use ($first, $second) {
            $query->where('first_user_id', $first->id);
            $query->where('second_user_id', $second->id);
        });
        $builder->orWhere(function (Builder $query) use ($first, $second) {
            $query->where('first_user_id', $second->id);
            $query->where('second_user_id', $first->id);
        });

        return $builder->first();
    }
}
