<?php

namespace App\Core\Dealer\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $firstName
 * @property string $lastName
 * @property string|null $patronymic
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $position
 * @property int $dealerId
 */
class DealerEmployee extends Model
{
    protected $table = 'dealer_employees';

    public function dealer(): BelongsTo
    {
        return $this->belongsTo(Dealer::class);
    }
}
