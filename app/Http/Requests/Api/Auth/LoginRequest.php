<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

/**
 * Class LoginRequest
 * @package App\Http\Requests\Api\Auth
 *
 * @property string $email
 * @property string $password
 */
class LoginRequest extends FormRequest
{
    /**
     * @return array
     * @todo реализовать request
     */
    public function rules(): array
    {
        return [
            'email' => ['required']
        ];
    }
}
