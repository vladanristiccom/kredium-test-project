<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    public const FIRST_NAME = 'first_name';

    public const LAST_NAME = 'last_name';

    public const EMAIL = 'email';

    public const PHONE = 'phone';

    protected $fillable = [
        self::EMAIL,
        self::PHONE,
        self::FIRST_NAME,
        self::LAST_NAME,
    ];

}
