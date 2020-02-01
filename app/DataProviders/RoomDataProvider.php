<?php

namespace App\DataProviders;

use App\Models\Room;
use App\Models\User;

/**
 * Получение данных сущности Room
 *
 * Class RoomDataProvider
 * @package App\DataProviders
 */
class RoomDataProvider
{
    private Room $room;

    /**
     * RoomDataProvider constructor.
     * @param Room $room
     */
    public function __construct(Room $room)
    {
        $this->room = $room;
    }

    /**
     * Получение комнаты по создателю и имени
     *
     * @param User $user
     * @param string $name
     * @return Room|null
     */
    public function getByCreatorAndName(User $user, string $name): ?Room
    {
        return $this->room
            ->where('created_by', $user->id)
            ->where('name', $name)
            ->first();
    }
}
