<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Сущность "Диалог"
 *
 * Class Dialog
 * @package App
 *
 * @property integer $id
 * @property integer $first_user_id
 * @property integer $second_user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 *
 * @property-read User $firstUser
 * @property-read User $secondUser
 *
 * @mixin Builder
 */
class Dialog extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    /**
     * Получение первого участника диалога
     *
     * @return HasOne
     */
    public function firstUser(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'first_user_id');
    }

    /**
     * Получение второго участника диалога
     *
     * @return HasOne
     */
    public function secondUser(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'second_user_id');
    }
}
