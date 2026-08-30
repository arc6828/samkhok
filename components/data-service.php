<?php
/**
 * Data Service for loading JSON configuration files
 */

if (!function_exists('get_json_data')) {
    function get_json_data($filename, $default = []) {
        $filepath = __DIR__ . '/../data/' . $filename;
        if (file_exists($filepath)) {
            $content = @file_get_contents($filepath);
            if (!empty($content)) {
                $decoded = json_decode($content);
                if ($decoded !== null) {
                    return $decoded;
                }
            }
        }
        return $default;
    }
}

if (!function_exists('get_researchers_data')) {
    function get_researchers_data() {
        return get_json_data('researchers.json', []);
    }
}

if (!function_exists('get_site_config')) {
    function get_site_config() {
        return get_json_data('site.json', (object)[]);
    }
}

if (!function_exists('get_gallery_data')) {
    function get_gallery_data() {
        return get_json_data('gallery.json', (object)[
            'base_path' => 'assets/img/gallery/',
            'images' => []
        ]);
    }
}
