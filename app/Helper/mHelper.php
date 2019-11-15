<?php

namespace App\Helper;

class mHelper
{
    public static function permalink($str)
    {
        $bul = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#', '.');
        $degistir = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp', '');
        $str = strtolower(str_replace($bul, $degistir, $str));
        $str = preg_replace('/[\']/', '', $str);
        $str = preg_replace("@[^A-Za-z0-9\-_\.\/\+]@i", ' ', $str);
        $str = preg_replace('/[_]+/', '-', $str);
        $str = trim(preg_replace('/\s+/', ' ', $str));
        $str = str_replace(' ', '-', $str);
        return $str;
    }

    static function selectOptions($selectId, $id)
    {
        return $selectId == $id ? " selected='selected'" : "";
    }
}
