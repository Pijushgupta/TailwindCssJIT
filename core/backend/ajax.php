<?php
namespace tailwindJIT\backend;
if (!defined('ABSPATH')) exit; // Exit if accessed directly


use tailwindJIT\Environment;

class Ajax{

    public static function do(){
        add_action('wp_ajax_getNodeInfo',array('tailwindJIT\backend\Ajax','getNodeInfo'));
    }

    public static function getNodeInfo(){
        if(!wp_verify_nonce($_POST['toolkit_nonce'],'toolkit_nonce'))  wp_die();
        $nodeArray = Environment::getNVersion();
        echo json_encode($nodeArray);
        wp_die();       
    }

}