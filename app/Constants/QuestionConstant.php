<?php

namespace App\Constants;

class QuestionConstant
{
    public const TEXT = 'text';
    public const RATING = 'rating';

    public const QUESTION_TYPE = [
        self::TEXT => 'Текст',
        self::RATING => 'Рейтинг',
    ];
}
