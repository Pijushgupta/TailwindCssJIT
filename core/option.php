<?php 
namespace tailwindJIT;
if(!defined('ABSPATH')) exit;

class Option{

    public static function toogle($optionName = false){
        if($optionName == false) return;
        update_option($optionName,!get_option($optionName,false));
        return get_option($optionName,false);
    }

}

