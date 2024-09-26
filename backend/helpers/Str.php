<?php
namespace backend\helpers;

class Str
{
    public static function limit($str, $max)
    {
        if($str && mb_strlen($str)>$max){
            return mb_substr($str, 0, $max, 'UTF-8').'...';
        }
        return $str;
    }
}