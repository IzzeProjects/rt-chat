<?php

namespace App\Http\Requests\Api\Dialog;

use App\Http\Requests\Api\AuthorizedRequest;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateRequest
 * @package App\Http\Requests\Api\Dialog
 *
 * @property array $user
 */
class CreateRequest extends FormRequest
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
            'user.id' => 'Идентификатор пользователя',
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
            'user.id' => ['required', 'integer', 'min:1'],
        ];
    }
}
