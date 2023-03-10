<?php

namespace NormanHuth\LocaleList;

class Helper
{
    public static function get($language): ?array
    {
        $baseLanguage = explode('_', $language)[0];
        $directory = __DIR__.'/../data/'.$baseLanguage.'/';

        $file = $directory.$language.'.php';
        if (file_exists($file)) {
            return require $file;
        }
        $file = $directory.$baseLanguage.'.php';
        if (file_exists($file)) {
            return require $file;
        }

        return null;
    }
}
