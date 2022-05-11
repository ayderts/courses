<?php

namespace App\Constants;

class CurrencyConstant
{
    public const KZT = 'kzt';
    public const RUB = 'rub';
    public const USD = 'usd';
    public const EUR = 'eur';

    public const CURRENCY = [
        self::KZT => 'тенге',
        self::RUB => 'рубль',
        self::USD => 'доллар',
        self::EUR => 'евро',
    ];
}
