<?php

namespace App\Helpers;

class ResponseHelper
{
    public static function message(string $message): array
    {
        return [
            'message'=>$message
        ];
    }
}
