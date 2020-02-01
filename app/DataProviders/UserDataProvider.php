<?php

namespace App\DataProviders;

use App\Http\Requests\Api\User\UsersRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

/**
 * Получение данных сущности User
 *
 * Class UserDataProvider
 * @package App\DataProviders
 */
class UserDataProvider
{
    private User $user;

    /**
     * UserDataProvider constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Получение всех пользователей
     *
     * @param UsersRequest $request
     * @return Collection
     * @todo Полнотекстовый поиск
     */
    public function getUsers(UsersRequest $request): Collection
    {
        $builder = $this->user->query();
//        $builder->whereRaw(
//            "MATCH(users.name, users.surname) AGAINST(:search in BOOLEAN MODE)",
//            [':search' => "$request->search*"]
//        );
        if ($request->user['email'] ?? false) {
            $builder = $this->user->whereRaw(
                'users.email = :users_email',
                [
                    'users_email' => $request->user['email']
                ]);
        }

        return $builder->get();
    }
}
