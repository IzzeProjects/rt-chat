<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Класс для преобразования array в object
 * Базовый класс для ресурсов типа array
 *
 * Class ArrayJsonResource
 * @package App\Http\Resources
 */
abstract class ArrayJsonResource extends JsonResource
{
    public function __construct($resource)
    {
        parent::__construct($resource);
        if (is_array($this->resource)) {
            $this->resource = (object)$this->resource;
        }
        $this->resource = is_array($this->resource) ? (object)$this->resource : $this->resource;
    }
}
