<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class HomeLoan extends Model
{
    const PROPERTY_VALUE = 'property_value';

    const DOWN_PAYMENT_AMOUNT = 'down_payment_amount';

    const ADVISOR_ID = 'advisor_id';

    protected $fillable = [
        self::ADVISOR_ID,
        self::DOWN_PAYMENT_AMOUNT,
        self::PROPERTY_VALUE
    ];

    public function client(): HasOne
    {
        return $this->hasOne(Client::class);
    }

}
