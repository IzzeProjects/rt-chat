<?php

namespace App\Http\Requests\Api\Room;

use App\Http\Requests\Api\AuthorizedRequest;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateRequest
 * @package App\Http\Requests\Api\Room
 *
 * @property string $name
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
            'name' => 'Название',
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
            'name' => ['required'],
        ];
    }
}
