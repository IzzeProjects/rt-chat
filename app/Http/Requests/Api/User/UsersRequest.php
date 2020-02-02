<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\Api\AuthorizedRequest;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UsersRequest
 * @package App\Http\Requests\Api\Room
 *
 * @property string|null $email
 */
class UsersRequest extends FormRequest
{
    use AuthorizedRequest;
    /**
     * Кастомные имена атрибутов
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'email' => 'Имя пользователя',
        ];
    }

    /**
     * Правила валидации
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => ['string', 'min:1'],
        ];
    }
}
