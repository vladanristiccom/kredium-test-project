<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CashLoan extends Model
{

    const LOAN_AMOUNT = 'loan_amount';

    const ADVISOR_ID = 'advisor_id';

    protected $fillable = [
        self::ADVISOR_ID,
        self::LOAN_AMOUNT
    ];

    public function client(): HasOne
    {
        return $this->hasOne(Client::class);
    }

}
