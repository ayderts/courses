<?php

namespace App\Constants;

class CourseTypeConstant
{
    public const ONLINE = 'online';
    public const OFFLINE = 'offline';
    public const MIXED = 'mixed';

    public const COURSE_TYPES = [
        self::ONLINE => 'Онлайн',
        self::OFFLINE => 'Оффлайн',
        self::MIXED => 'Смешанный',
    ];
}
