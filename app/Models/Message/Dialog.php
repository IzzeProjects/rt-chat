<?php

namespace App\Models\Message;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Сущность "Сообщение в диалоге"
 *
 * Class Room
 * @package App
 *
 * @property integer $id
 * @property string $content
 * @property integer $to_user_id
 * @property integer $from_user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read User $sentTo
 * @property-read User $sentFrom
 *
 * @mixin Builder
 */
class Dialog extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    /**
     * Получение пользователя, которому было отпарвлено сообщение
     *
     * @return HasOne
     */
    public function sentTo(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'to_user_id');
    }

    /**
     * Получение пользователя, от которого было отпарвлено сообщение
     *
     * @return HasOne
     */
    public function sentFrom(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'from_user_id');
    }
}
