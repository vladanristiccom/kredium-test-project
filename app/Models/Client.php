<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    public const FIRST_NAME = 'first_name';

    public const LAST_NAME = 'last_name';

    public const EMAIL = 'email';

    public const PHONE = 'phone';

    public const HOME_LOAN_ID = 'home_loan_id';

    public const CASH_LOAN_ID = 'cash_loan_id';

    protected $fillable = [
        self::EMAIL,
        self::PHONE,
        self::FIRST_NAME,
        self::LAST_NAME,
        self::HOME_LOAN_ID,
        self::CASH_LOAN_ID
    ];

    public function homeLoan(): BelongsTo
    {
        return $this->belongsTo(HomeLoan::class);
    }

    public function cashLoan(): BelongsTo
    {
        return $this->belongsTo(CashLoan::class);
    }

}
