<?php

namespace App\Constants;

class NotificationConstant
{
    public const NEWS = 'news';
    public const SURVEY = 'survey';

    public const NOTIFICATION_TYPE = [
        self::NEWS => 'Новости',
        self::SURVEY => 'Опрос',
    ];
}
