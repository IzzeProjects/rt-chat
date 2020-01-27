<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Сущность "Комната"
 *
 * Class Room
 * @package App
 *
 * @property integer $id
 * @property string $name
 * @property integer $created_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read User $creator
 *
 * @mixin Builder
 */
class Room extends Model
{
    protected $guarded = [];

    /**
     * Получение пользователя
     *
     * @return HasOne
     */
    public function creator(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
}
