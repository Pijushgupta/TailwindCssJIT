<?php
namespace tailwindJIT;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

use tailwindJIT\Tailwind;

class Theme{

    public static function watch(){
        add_action('switch_theme', array('tailwindJIT\Theme','regenThemeConfig'));
    }

    /**
     * On theme change this method will get fired 
     * and a new tailwind config file will get generated 
     * which will help tailwind to generate tailwind css
     * @return void
     */
    public static function regenThemeConfig(){
        Tailwind::createFile(Tailwind::generateConfig(true));
    }
}
