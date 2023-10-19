<?php

namespace Core;

class Lang{
    protected static $data = null;
    protected static $locale = 'vi';

    public static function setLang($lang = 'vi')
    {
        $locale = in_array($lang, ['vi', 'en'])?$lang:'vi';
        self::$locale = $locale;
        // $content = file_get_contents(dirname(__DIR__).'/language/'.$locale.'.json');
        // self::$data = new Arr(json_decode($content, true));

        $content = file_get_contents(dirname(__DIR__).'/languages/'.$locale.'.txt');

        
        // test = Doãn Đẹp Trai + Giàu = auto có gấu

        preg_match_all('/([^\=\r\n\t]*?)\s*\=(.*)?(\r\n|\r|\n|$)/i', $content, $match);
        $data = array_combine(array_map('trim', $match[1]), array_map('trim', $match[2]));

        self::$data = new Arr($data);
    }

    
    public static function getText($key)
    {
        if(self::$data){
            return self::$data->get($key);
        }
        return null;
    }

    public static function getLocale()
    {
        return self::$locale;
    }
}