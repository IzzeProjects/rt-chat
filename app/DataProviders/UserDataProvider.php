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
     */
    public function getUsers(UsersRequest $request): Collection
    {
        $builder = $this->user->query();

        if ($request->email ?? false) {
            $builder = $this->user->where('email', 'like', $request->email . '%');
        }

        return $builder->get();
    }
}
