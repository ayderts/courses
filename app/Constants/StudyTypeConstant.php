<?php

namespace App\Constants;

/**
 * также используется как coach_type в таблице users
 */

class StudyTypeConstant
{
    public const INNER = 'inner';
    public const EXTERNAL = 'external';

    public const STUDY_TYPES = [
        self::INNER => 'Внутренний',
        self::EXTERNAL => 'Внешний',
    ];
}
