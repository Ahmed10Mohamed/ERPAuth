<?php

use Illuminate\Support\Facades\App;

if(!function_exists('translate')) {
    function translate($key)
    {
        $local = app()->getLocale();
        App::setLocale($local);
        // $lang_array = include('E:\mywork\Gamal\hospital\lang/' . $local . '/messages.php');
        $lang_array = include(base_path('lang/' . $local . '/messages.php'));

        $processed_key = ucfirst(str_replace('_', ' ', remove_invalid_charcaters($key)));

        if (!array_key_exists($key, $lang_array)) {
            $lang_array[$key] = $processed_key;
            $str = "<?php return " . var_export($lang_array, true) . ";";
            file_put_contents(base_path('lang/' . $local . '/messages.php'), $str);

            $result = $processed_key;
        } else {
            $result = __('messages.' . $key);
        }
        return $result;
    }
}
if(!function_exists('slug')) {
function slug($title, $separator = '_', $language = 'en')
    {

        // Convert all dashes/underscores into separator
        $flip = $separator === '-' ? '_' : '-';

        $title = preg_replace('!['.preg_quote($flip).']+!u', $separator, $title);

        // Replace @ with the word 'at'
        $title = str_replace('@', $separator.'at'.$separator, $title);

        // Remove all characters that are not the separator, letters, numbers, or whitespace.

        // Replace all separator characters and whitespace by a single separator
        $title = preg_replace('!['.preg_quote($separator).'\s]+!u', $separator, $title);

        return trim($title, $separator);
    }
}
