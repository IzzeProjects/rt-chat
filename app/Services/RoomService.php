<?php

namespace App\Services;

use App\Exceptions\ModelSaveException;
use App\Http\Requests\Api\Room\CreateRequest;
use App\Models\Room;
use App\Models\User;

/**
 * Сервис для работы с сущностью "Комната"
 *
 * Class RoomService
 * @package App\Services
 */
class RoomService
{
    private Room $room;

    /**
     * RoomService constructor.
     * @param Room $room
     */
    public function __construct(Room $room)
    {
        $this->room = $room;
    }

    /**
     * Создание комнаты
     *
     * @param CreateRequest $request
     * @return Room
     * @throws ModelSaveException
     */
    public function create(CreateRequest $request): Room
    {
        /** @var User $user */
        $user = $request->user();

        $room = new Room();
        $room->name = $request->name;
        $room->created_by = $user->id;

        if (!$room->save()) {
            throw new ModelSaveException();
        }

        return $room;
    }
}
