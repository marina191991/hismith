<?php

namespace App\Core\Dealer\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $name
 * @property string $phone
 * @property string|null $email
 * @property string|null $city
 * @property string|null $address
 */
class Dealer extends Model
{
    public function dealerEmployees(): HasMany
    {
        return $this->hasMany(DealerEmployee::class);
    }
}
