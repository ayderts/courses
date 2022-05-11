<?php

namespace App\Constants;

class FileTypeConstant
{
    public const REQUIRED = 'required';
    public const OPTIONAL = 'optional';

    public const FILE_TYPES = [
        self::REQUIRED => 'Обязательный',
        self::OPTIONAL => 'Желательный',
    ];

    public const FILE_TYPE_COLORS = [
        self::REQUIRED => 'green',
        self::OPTIONAL => 'blue', # можно вместо добавить hex-color
    ];
}
