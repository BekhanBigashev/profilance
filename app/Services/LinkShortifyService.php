<?php

namespace App\Services;

class LinkShortifyService
{
    private static int $codeLength;

    public function __construct(int $codeLength)
    {
        self::$codeLength = $codeLength;
    }
    public static function getShortLink(string $fullLink): string
    {
        $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789#';
        $numChars = strlen($chars);
        $string = '';
        for ($i = 0; $i < self::$codeLength; $i++) {
            $string .= substr($chars, rand(1, $numChars) - 1, 1);
        }
        return $string;
    }
}
