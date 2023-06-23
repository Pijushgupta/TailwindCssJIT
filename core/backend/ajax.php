<?php
namespace tailwindJIT\backend;
if (!defined('ABSPATH')) exit; // Exit if accessed directly


use tailwindJIT\Environment;
use tailwindJIT\Tailwind;

class Ajax{

    public static function do(){
        add_action('wp_ajax_getNodeInfo',array('tailwindJIT\backend\Ajax','getNodeInfo'));
        add_action('wp_ajax_regenerateTailwindConfig',array('tailwindJIT\backend\Ajax','regenerateTailwindConfig'));
    }

    public static function getNodeInfo(){
        if(!wp_verify_nonce($_POST['toolkit_nonce'],'toolkit_nonce'))  wp_die();
        $nodeArray = Environment::getNVersion();
        $nodeArray['json'] = Environment::getPackageJsonInfo();
        echo json_encode($nodeArray);
        wp_die();       
    }

    public static function regenerateTailwindConfig(){
        if(!wp_verify_nonce($_POST['toolkit_nonce'],'toolkit_nonce'))  wp_die();
        echo json_encode(Tailwind::createFile(Tailwind::generateConfig(true)));
        wp_die();
    }

}