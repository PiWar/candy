<?php

namespace App\Helpers;

class StrMB
{

    /**
     * @param  string  $string
     *
     * @return string
     */
    static function ucfirst ( string $string ): string
    {
        return mb_convert_case( mb_substr($string, 0, 1), MB_CASE_TITLE, "UTF-8" ) . mb_substr( $string, 1 );
    }

}
