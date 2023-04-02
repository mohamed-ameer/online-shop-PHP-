<?php
namespace helpers;

class Str{
    public static function limit(string $str){
        if(strlen($str) > 80){
            $str = substr($str,0,80) . ' ...';
            return $str;
        }
        return $str;
    }
}