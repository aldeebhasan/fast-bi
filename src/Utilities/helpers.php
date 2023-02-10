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

    function maxCount(array $data)
    {
        if (count($data) == 0) return 0;
        return max(array_map(fn($x) => count((array)$x), $data));

    }

    function widgetPath($fineName)
    {
        return __DIR__ . "/../Views/Widgets/$fineName";
    }

    function assetPath($fineName)
    {
        return __DIR__ . "/../../public/$fineName";
    }

}