<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

/**
 * Базовый контроллер для API
 *
 * Class ApiController
 * @package App\Http\Controllers\Api
 */
class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Выдача ответа в формате JSON
     * Данные находятся в поле data
     * Код ответа по умолчанию 200
     *
     * @param mixed $data
     * @param int $status
     * @return JsonResponse
     */
    public function data($data = null, $status = 200)
    {
        if (is_null($data)) {
            $data = new \ArrayObject();
        }

        return new JsonResponse(
            ['data' => $data],
            $status,
            ['Content-type' => 'application/vnd.api+json'],
            JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
        );
    }

    /**
     * Выдача ответа в формате JSON
     * Данные об ошибках в поле errors
     * Код ответа по умолчанию 500
     *
     * @param array $errors
     * @param int $status
     * @return JsonResponse
     */
    public function errors($errors, $status = 500)
    {
        return new JsonResponse(
            ['errors' => $errors],
            $status,
            ['Content-type' => 'application/vnd.api+json'],
            JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
        );
    }
}
