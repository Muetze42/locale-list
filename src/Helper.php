<?php

namespace NormanHuth\LocaleList;

class Helper
{
    /**
     * Get language list as array
     *
     * @param string      $language
     * @param string|null $fallbackLanguage
     * @return array|null
     */
    public static function get(string $language = 'en', ?string $fallbackLanguage = null): ?array
    {
        $data = static::getData($language);
        if ($data) {
            return $data;
        }

        return $fallbackLanguage ? static::getData($fallbackLanguage) : null;
    }

    /**
     * @param string $language
     * @return array|null
     */
    protected static function getData(string $language): ?array
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
