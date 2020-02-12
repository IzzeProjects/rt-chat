<?php

namespace App\DataProviders;

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
     * Полчение всех пользователей по email исключая данного пользователя
     *
     * @param string $email
     * @param User $user
     * @return Collection
     */
    public function getUsersByEmailExceptGivenUser(string $email, User $user): Collection
    {
        $builder = $this->user->query();

        $builder->where('email', 'like', $email . '%');
        $builder->where('id', '<>', $user->id);

        return $builder->get();
    }
}
