<?php

if (!function_exists('includeWithVariables')) {
    function includeView($filePath, $variables = [])
    {
        $output = null;
        if (file_exists($filePath)) {
            extract($variables);
            ob_start();
            include $filePath;
            $output = ob_get_clean();
        }
        return $output;
    }
}

if (!function_exists('maxCount')) {
    function maxCount(array $data)
    {
        if (count($data) == 0) {
            return 0;
        }
        return max(array_map(fn ($x) => count((array)$x), $data));
    }
}

if (!function_exists('widgetPath')) {
    function widgetPath($fineName)
    {
        return __DIR__ . "/../Views/Widgets/$fineName";
    }
}

if (!function_exists('assetPath')) {
    function assetPath($fineName)
    {
        return __DIR__ . "/../../public/$fineName";
    }
}
