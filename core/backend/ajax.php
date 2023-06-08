<?php
namespace tailwindJIT\backend;
if (!defined('ABSPATH')) exit; // Exit if accessed directly


use tailwindJIT\Environment;

class Ajax{

    public static function do(){
        add_action('wp_ajax_getNodeInfo',array('tailwindJIT\backend\Ajax','getNodeInfo'));
    }

    public static function getNodeInfo(){
        $nodeArray = Environment::getNVersion();
        echo json_encode($nodeArray);
        wp_die();       
    }

}