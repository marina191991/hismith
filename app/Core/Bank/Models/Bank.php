<?php

namespace App\Core\Bank\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property  int $id
 * @property  string $name
 * @property  string $email
 * @property  string $phoneFirst
 * @property  string|null $phoneSecond
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Bank extends Model
{
    protected $table = 'banks';
}
