<?php


namespace App\Util;


class ApiStatus
{
    const SUCCESS = 2000;
    const ERROR = 4000;
    const UNAUTHENTICATED = 4001;

    private const message = [
        self::SUCCESS => 'success',
        self::ERROR => 'error',
        self::UNAUTHENTICATED => '无权访问',
    ];

    /**
     * @param int $status
     * @return string
     */
    static function Message(int $status): string
    {
        return self::message[$status];
    }
}
