<?php


namespace App\Constants;


class JSONConstant
{
    public const INVALID_CREDENTIALS_TITLE = 'Не верные данные';
    public const INVALID_CREDENTIALS_DETAIL = 'Пожалуйста, введите валидные данные';

    public const USER_NOT_FOUND_TITLE = 'Пользователь не найден';
    public const USER_NOT_FOUND_DETAIL = 'Пользователь не найден';

    public const TOKEN_INVALID_TITLE = 'Токен не валидный';
    public const TOKEN_ABSENT_TITLE = 'Токен отсутствует';
    public const TOKEN_EXPIRED_TITLE = 'Токен просрочен';

    public const EMAIL_ALREADY_VERIFIED_TITLE = 'Почта уже подтверждена';
    public const EMAIL_ALREADY_VERIFIED_DETAIL = 'Почта была уже подтверждена ранее';

    public const BAD_REQUEST_STATUS = '400';
    public const NOT_FOUND_STATUS = '404';

    public const JWT_ALGORITHM = 'HS256';
}
