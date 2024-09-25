<?php
namespace backend\helpers;

class Str
{
    public static function limit($str, $max)
    {
        if(mb_strlen($str)>$max){
            return mb_substr($str, 0, $max, 'UTF-8').'...';
        }
        return $str;
    }
}