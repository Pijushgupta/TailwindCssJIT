<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Plugin Name: TailwindCss JIT
 * Plugin URI: https://www.aavoya.co/tailwind-jit
 * Author: Pijush Gupta
 * Author uri: https://www.linkedin.com/in/pijush-gupta-php/
 * Description: Generate Per page Tailwind css with JIT
 * Version: 2023.05.29
 * Tags: css, performance, tailwindcss
 */

/**
 * Loading the plugin files
 */
 if(!file_exists(__DIR__ .DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'app.php')) return;
 require_once __DIR__.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'app.php';
