<?php

namespace App\Http\Requests\Api\Dialog;

use App\Http\Requests\Api\AuthorizedRequest;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UsersRequest
 * @package App\Http\Requests\Api\Dialog
 *
 * @property string $email
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
            'email' => 'Почта',
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
            'email' => ['string', 'required', 'min:1'],
        ];
    }
}
