<?php

namespace App\Exceptions;

use Throwable;

/**
 * Ошибка при сохранении модели
 *
 * Class ModelSaveException
 * @package App\Exceptions
 */
class ModelSaveException extends \Exception
{
    /**
     * ModelSaveException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "Ошибка при сохранении модели", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
