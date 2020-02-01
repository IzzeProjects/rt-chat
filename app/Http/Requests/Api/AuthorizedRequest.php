<?php

namespace App\Http\Requests\Api;

/**
 * Авторизованный запрос
 *
 * Trait AuthtorizedRequest
 * @package App\Http\Requests\Api
 */
trait AuthorizedRequest
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
