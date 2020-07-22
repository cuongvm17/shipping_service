<?php

namespace App\Helper;

class MaxHelper
{
    public static function maxMethodInArray($array, $methodName)
    {
        return max(array_map(function($o) use($methodName) {
            return $o->$methodName();
        }, $array));
    }
}