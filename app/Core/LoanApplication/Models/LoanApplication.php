<?php

namespace App\Core\LoanApplication\Models;

use App\Core\Bank\Models\Bank;
use App\Core\Dealer\Models\Dealer;
use App\Core\Dealer\Models\DealerEmployee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $dealer_id
 * @property int $dealer_employee_id
 * @property int $bank_id
 * @property float $amount
 * @property int $term
 * @property float $interest_rate
 * @property string $reason_description
 * @property string $status
 */
class LoanApplication extends Model
{
    public const STATUS_NEW = 'new';
    public const STATUS_ON_REVIEW = 'on_review';
    public const STATUS_ACCEPTED = 'accepted';
    public const STATUS_DECLINED = 'declined';

    protected $fillable = [
        'dealer_id',
        'dealer_employee_id',
        'bank_id',
        'amount',
        'term',
        'interest_rate',
        'reason_description',
        'status'
    ];

    public function dealer(): BelongsTo
    {
        return $this->belongsTo(Dealer::class);
    }

    public function dealerEmployee(): BelongsTo
    {
        return $this->belongsTo(DealerEmployee::class);
    }

    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class);
    }
}
