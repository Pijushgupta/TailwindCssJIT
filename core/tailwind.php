<?php
namespace tailwindJIT;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Tailwind{
   
    /**
     * Finding the path for content files
     * @param void
     * @return void
     */
    private static function getContentLocation($includeThemeSupport){
        $paths[] = "'./pages/*.html'";
        if($includeThemeSupport == true){
            if (is_child_theme()) {
                $paths[] = '"'.str_replace("\\","\\\\",get_stylesheet_directory()). '/**/*.{php,js,jsx,vue}'.'"';
                $paths[] = '"'.str_replace("\\","\\\\",get_stylesheet_directory()). '/*.{php,js,jsx,vue}'.'"';
                $paths[] = '"'.str_replace("\\","\\\\",get_stylesheet_directory()). '/**/*.{php,js,jsx,vue}'.'"';
                $paths[] = '"'.str_replace("\\","\\\\",get_stylesheet_directory()). '/*.{php,js,jsx,vue}'.'"';
            } else {
                $paths[] = '"'.str_replace("\\","\\\\",get_stylesheet_directory()). '/**/*.{php,js,jsx,vue}'.'"';
                $paths[] = '"'.str_replace("\\","\\\\",get_stylesheet_directory()). '/*.{php,js,jsx,vue}'.'"';
            }
        }
		
		return implode(", \n",$paths) . "\n";
    }

    public static function generateConfig($includeThemeSupport = false){
        $config = "/** @type {import('tailwindcss').Config} */ \n";
        $config .= "module.exports = { \ncontent: [" . self::getContentLocation($includeThemeSupport) . "],\ntheme: { extend: {}, }, \nplugins: [require('@tailwindcss/typography'),require('@tailwindcss/forms')],\n}";
        return $config;
    }

    public static function createFile($content = false){
        if($content == false) return;
        $filePath = __DIR__ . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'tailwind.config.js';
        file_put_contents( $filePath, $content);
    }
   


}