<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Авторизованный запрос c формы
 *
 * Class AuthorizedFormRequest
 * @package App\Http\Requests\Api
 */
class AuthorizedFormRequest extends FormRequest
{
    /**
     * Авторизованный запрос
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
